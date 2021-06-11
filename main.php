<?php


add_action('wp_footer', 'my_custom_footer_js');

add_shortcode('policystatement', 'policy_statement_shortcode');

add_shortcode('policyreceipt', 'policy_receipt_shortcode');



function my_custom_footer_js()
{
    echo '<script src="' . get_template_directory_uri() . '/milil/js/custom-vue.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/custom-axios.min.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/custom-sweetalert.min.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/custom-moment.min.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/jquery.min.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/printthis.min.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/statement-custom.js"></script>';
}


// defining Shortcode

function policy_statement_shortcode()
{
    $output  = '<div class="container" id="pStatement">
    <div class="row" style="padding-top: 80px" v-if="!this.isData">
        <div class="col-md-12 col-sm-12 col-lg-12"></div>
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="login-form form-bg popup-form" style="overflow: hidden;background-color: none">
                <div class="main-div">
                    <form @submit.prevent="submit" action="loginToDBMobile.php" method="POST">
                        <div class="form-group">
                            <input placeholder="Enter Policy Number" type="text" class="form-control" v-model="inputPolicy" required>
                        </div>

                        <div class="form-group">
                            <input placeholder="Enter Mobile Number" type="number" class="form-control" v-model="inputMobile" required>
                        </div>

                        <div class="form-group">
                            Date Of Birth:
                            <input placeholder="Date Of Birth" type="Date" class="form-control" v-model="inputDOB" required>
                        </div>
                        <br>
                        <input type="submit" @click="submit" class="btn btn-block" style="background-color:#1C6A49; color: #fff;" name="Preview" value="Preview">

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12"></div>
    </div>
    <div class="row" style="padding-top: 80px" v-else>
        <div class="col-md-12">
            <h2 class="text-center">Policy Holder : <span class="text-center">{{data.name}}</span></h2>
            <h2 class="text-center">Mobile : <span class="text-center">{{data.mobileNumber}}</span></h2>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            Policy No
                        </th>
                        <th>{{data.policyNo}}</th>
                        <th>Commencement Date</th>
                        <th>{{formatDate(data.comDate)}}</th>
                    </tr>
                    <tr>
                        <th>
                            Sum Assured
                        </th>
                        <th>{{data.sumAssured}}</th>
                        <th>Maturity</th>
                        <th>{{formatDate(data.maturityDate)}}</th>
                    </tr>
                    <tr>
                        <th>
                            Premium Installment
                        </th>
                        <th>{{data.totalPremium}}</th>
                        <th>Next Due Date</th>
                        <th>{{data.mode == "Single" ? "" : formatDate(data.nextDueDate)}}</th>
                    </tr>
                    <tr>
                        <th>
                            Mode Of Installment
                        </th>
                        <th>{{data.mode}}</th>
                    </tr>
                </thead>
            </table>
            <table style="margin-top:20px" class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>PR No.</th>
                        <th>PR Date</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in data.payments" :key="index">
                        <td>{{index + 1}}</td>
                        <td>{{item.Prno}}</td>
                        <td>{{formatDate(item.PRDate)}}</td>
                        <td>{{parseInt(item.NumberofPaidInstolment) * parseInt(data.totalPremium)}}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Total
                        </td>
                        <td>{{totalAmount}}</td>
                    </tr>
                </tbody>
            </table>

            <button class="btn btn-sm btn-primary text-center" style="margin-top:20px" @click="viewAgain">Search Again</button>
        </div>
    </div>
</div>';

    return $output;
}



// defining Shortcode

function policy_receipt_shortcode()
{
    $output = '<div id="pStatement">
    <div style="width:100%; margin: 0 auto">
        <div style="text-align: center;width:50%;margin:0 auto;overflow:hidden" v-if="!Object.keys(data).length">
            <div style="display: block;">
                <label for="">PR Number/TransactionID</label>
                <input type="text" v-model="formData.prNo">
            </div>
            <div style="display: block;">
                <label for="">Mobile Number</label>
                <input type="text" v-model="formData.mobileNo">
            </div>
            <div style="display: block;">
                <button style="width:100%;padding:10px;cursor:pointer" @click="getData">Submit</button>
            </div>
        </div>
        <div class="wrapper" v-else>
            <div style="width:70%;text-align:center;margin:0 auto;">
                <img src="https://milil.com.bd/wp-content/uploads/2021/04/mercantile-logo1-Banner.jpg" width="100%" style="margin:0 auto" height="auto" alt="">
                <p>
                    Head Office: Al-Razi Complex (8th Floor), 166-167,
                    Shaheed Sayed Nazrul Islam Sharani Purana Paltan, Dhaka-1000
                    <br>
                    Email: info@milil.com.bd; Website: www.milil.com.bd; Hotline: 09603 001122
                </p>
            </div>
            <div style="padding:10px;float:left;width:97%;border:2px solid #000">
                <div style="display: block;width:97%;">
                    <div style=" width:50%;">
                        <p>
                            Office : {{data.OfficeCode}}
                            <br>
                            Policy No : {{data.Policyno}}
                            <br>
                            PR No : {{formData.prNo}}
                            <br>
                            Date : {{formatDate(data.PRDate)}}
                            <br>
                            Premium No : {{premiumNumberString()}}
                        </p>
                    </div>
                </div>
                <div style="width:50%;float:left">.</div>
                <div style="width:100%">
                    <table style="width:100%;border-collapse: collapse;" border="1">
                        <thead>
                            <tr>
                                <th>Policy Holders Name</th>
                                <th>Risk Date</th>
                                <th>Table-Term</th>
                                <th>Due Date</th>
                            </tr>
                            <tr>
                                <td rowspan="4">
                                    {{data.ProposersName}}
                                    <br>
                                    {{data.ProposersAddress}}
                                </td>
                            </tr>
                            <tr>
                                <td>{{formatDate(data.RiskDate)}}</td>
                                <td>{{data.Planno}} - {{data.Term}}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Sum Assured</th>
                                <th>Mode </th>
                                <th>Premium Amount</th>
                            </tr>
                            <tr>
                                <td>{{data.SumAssured}}</td>
                                <td>{{data.Mode}}</td>
                                <td>{{data.TotalPremium}}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div style="margin-top: 10px;">
                    <div style="float:left;width:60%">
                        <p>Next Due Date : {{formatDate(data.NextDueDate)}}</p>
                    </div>
                    
                    <div style="float:left;width:33%">
                        <table border="0" width="100%">
                            <tr>
                                <td>Total Paid installment <span style="float:right">:</span></td>
                                <td style="float:right">{{data.TotalInstallment}}</td>
                            </tr>
                            <tr>
                                <td>Total Premium <span style="float:right">:</span></td>
                                <td style="float:right">{{parseInt(data.TotalPremium) * parseInt(data.TotalInstallment)}}</td>
                            </tr>
                            <tr>
                                <td>Late Fee <span style="float:right">:</span></td>
                                <td style="float:right">{{data.LateFee}}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div style="height:1px;width:100%;background:#000"></div>
                                </td>
                            </tr>
                            <tr>
                                <td>Total <span style="float:right">:</span></td>
                                <td style="float:right">{{getTotal()}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div style="margin-top:288px">
                    <p style="text-align: center;font-weight:700">This RECEIPT is computer generated, authorized signature is not required</p>
                </div>
            </div>
        </div>
    </div>
    <button style="margin-top:30px;width:100%;padding:10px;margin-bottom:10px;"@click="viewAgain">Again</button>
</div>
<button style="margin-top:30px;width:100%;padding:10px;margin-bottom:10px;" onclick="print()">Print</button>';

return $output;
}
