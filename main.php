<?php

// Adding Bootstrap

// function add_theme_scripts()
// {
//     wp_enqueue_style('bootstrap', get_template_directory_uri() . '/milil/css/bootstrap.min.css');
// }
// add_action('wp_enqueue_scripts', 'add_theme_scripts');




// Adding Custom Script

add_action('wp_footer', 'my_custom_footer_js');

function my_custom_footer_js()
{
    echo '<script src="' . get_template_directory_uri() . '/milil/js/custom-vue.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/custom-axios.min.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/custom-sweetalert.min.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/statement-custom.js"></script>';
    echo '<script src="' . get_template_directory_uri() . '/milil/js/custom-moment.min.js"></script>';
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
                        <input @click="submit" class="btn btn-block" style="background-color:#1C6A49; color: #fff;" name="Preview" value="Preview">

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


add_shortcode('policystatement', 'policy_statement_shortcode');
