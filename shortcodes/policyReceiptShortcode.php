<?php 


add_shortcode('policyreceipt', 'policy_receipt_shortcode');


// defining Shortcode

function policy_receipt_shortcode()
{
    ob_start();

?>

    <div id="pStatement">
        <div style="width:100%; margin: 0 auto">
            <div style="text-align: left;width:50%;margin:0 auto;overflow:hidden" v-if="!Object.keys(data).length">

                <div style="display: block;">
                    <label for="">PR Number/TransactionID</label>
                    <input style="width: 100%;
                    padding: 12px 20px;
                    margin: 8px 0;
                    display: inline-block;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box; " type="text" v-model="formData.prNo">
                </div>

                <div style="display: block;">
                    <label for="">Mobile Number</label>
                    <input style="width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box; " type="text" v-model="formData.mobileNo">
                </div>

                <div style="display: block;">
                    <button style="width: 100%;
                background-color: #00897B;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;" @click="getData">Submit</button>
                </div>
            </div>


            <div class="wrapper" v-else>
                <div style="width:70%;text-align:center;margin:0 auto;">
                    <img src="https://milil.com.bd/wp-content/uploads/2021/04/mercantile-logo1-Banner.jpg" width="100%" style="margin:0 auto" height="auto" alt="">
                    <p>
                        <b>Head Office:</b> Al-Razi Complex (8th Floor), 166-167,
                        Shaheed Sayed Nazrul Islam Sharani Purana Paltan, Dhaka-1000
                        <br>
                        <b>Email:</b> info@milil.com.bd; <b>Website:</b> www.milil.com.bd; <b>Hotline:</b> 09603 001122
                    </p>
                </div>

                <div style="padding:10px; padding-left:20px; float:left;width:95%;border:1px solid #000">
                    <div style="display: block;width:97%;">
                        <div style=" width:50%;">
                            <p>
                                <b>Office :</b> {{data.OfficeCode}}
                                <br>
                                <b>Policy No :</b> {{data.Policyno}}
                                <br>
                                <b>PR No :</b> {{formData.prNo}}
                                <br>
                                <b>Date :</b> {{formatDate(data.PRDate)}}
                                <br>
                                <b>Premium No :</b> {{premiumNumberString()}}
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
        <div style="padding-left: 30%">

            <button style="background-color: #099268; color: #fff; margin-top:30px; margin-right: 2%; width:30%;float:left;padding:10px;margin-bottom:10px;" @click="viewAgain">Another Receipt Print</button>
            <button style="background-color: #099268; color: #fff; talign: center; margin-top:30px;width:30%;float:left;padding:10px;margin-bottom:10px;" onclick="print()">Print</button>

        </div>

    </div>

<?php

    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
