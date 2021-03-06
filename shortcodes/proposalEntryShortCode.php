<?php 


add_shortcode('proposalentry', 'proposal_entry_shortcode');



function proposal_entry_shortcode()
{
    ob_start();
?>
    <div id="proposalEntry" style="width:100%" class="wrapper_all">
        <form v-if="isData" style="width:100%" method="post" action="policy.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Personal Information</legend>
                <div class="grid-container">
                    <div class="grid-item">
                        <label style="margin-right:150px;">Document ID</label>
                        <input type="text" name="documentId" placeholder="Enter Document ID"><br>
                        <label style="margin-right:132px;">Applicant Name</label>
                        <input type="text" name="afname" placeholder="Enter First Name">
                        <input type="text" name="alname" placeholder="Enter Last Name"><br>
                        <label style="margin-right:68px;">Applicant\'s Father Name</label>
                        <input type="text" name="affname" placeholder="Enter First Name">
                        <input type="text" name="aflname" placeholder="Enter Last Name"><br>
                        <label style="margin-right:64px;">Applicant\'s Mother Name</label>
                        <input type="text" name="amfname" placeholder="Enter First Name">
                        <input type="text" name="amlname" placeholder="Enter Last Name"><br>
                        <label style="margin-right:197px;">Gender</label>
                        <select name="gender" id="dropdown">
                            <option style="display:none">Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select><br>
                        <label style="margin-right:147px;">Martial Status</label>
                        <select name="mstatus" id="dropdown">
                            <option style="display:none">Select marital status</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                            <option value="divorced">Divorced</option>
                            <option value="widowed">Widowed</option>
                        </select><br>
                        <label style="margin-right:175px;">Profession</label>
                        <input type="text" name="profession" placeholder="Enter Profession"><br>
                        <label style="margin-right:67px;">Educational Qualification</label>
                        <select name="eduqualification" id="dropdown">
                            <option style="display:none">Select Educational Qualification</option>
                            <option value="psc">PSC</option>
                            <option value="jsc">JSC</option>
                            <option value="ssc">SSC/Equivalent</option>
                            <option value="hsc">HSC/Equivalent</option>
                            <option value="bsc">Bachelors</option>
                            <option value="msc">Masters</option>
                            <option value="phd">PhD</option>
                        </select><br>
                        <label style="margin-right:143px;">Phone Number</label>
                        <input type="text" name="phonenumber" placeholder="Enter Phone Number"><br>
                        <label style="margin-right:214px;">Email</label>
                        <input type="email" name="email" placeholder="Enter Email"><br>
                    </div>
                    <div class="grid-item">
                        <label>Uplaod Your Photo</label>
                        <input type="file" name="image" id="profileimage" onchange="displayImage(this)">
                        <img src="user.jpg" id="profiledisplay" onclick="triggerClick()"><br>
                        <label style="margin-right:200px;">Date of Birth</label>
                        <input type="date" name="birthdate" placeholder="Enter Birth Date"><br>
                        <label style="margin-right:215px;">Birth Place</label>
                        <input type="text" name="birthplace" placeholder="Enter Birth Place"><br>
                        <label style="margin-right:236px;">Country</label>
                        <select name="country" id="dropdown">
                            <option style="display:none">Select a country</option>
                            <option value="Afganistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bonaire">Bonaire</option>
                            <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Canary Islands">Canary Islands</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Channel Islands">Channel Islands</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos Island">Cocos Island</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cote DIvoire">Cote DIvoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Curaco">Curacao</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands">Falkland Islands</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Ter">French Southern Ter</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Great Britain">Great Britain</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Hawaii">Hawaii</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="India">India</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Isle of Man">Isle of Man</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea North">Korea North</option>
                            <option value="Korea South">Korea South</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Midway Islands">Midway Islands</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Nambia">Nambia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherland Antilles">Netherland Antilles</option>
                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                            <option value="Nevis">Nevis</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau Island">Palau Island</option>
                            <option value="Palestine">Palestine</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Phillipines">Philippines</option>
                            <option value="Pitcairn Island">Pitcairn Island</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                            <option value="Republic of Serbia">Republic of Serbia</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="St Barthelemy">St Barthelemy</option>
                            <option value="St Eustatius">St Eustatius</option>
                            <option value="St Helena">St Helena</option>
                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                            <option value="St Lucia">St Lucia</option>
                            <option value="St Maarten">St Maarten</option>
                            <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                            <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                            <option value="Saipan">Saipan</option>
                            <option value="Samoa">Samoa</option>
                            <option value="Samoa American">Samoa American</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Tahiti">Tahiti</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Erimates">United Arab Emirates</option>
                            <option value="United States of America">United States of America</option>
                            <option value="Uraguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City State">Vatican City State</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                            <option value="Wake Island">Wake Island</option>
                            <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zaire">Zaire</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select><br>
                        <label style="margin-right:215px;">Nationality</label>
                        <input type="text" name="nationality" placeholder="Enter Nationality"><br>
                        <label style="margin-right:70px;">Choose Verification Document</label>
                        <select name="documenttype" id="dropdown">
                            <option style="display:none">Select Verification Document</option>
                            <option value="voterid">Voter ID</option>
                            <option value="birthcertificate">Birth Certificate</option>
                            <option value="passport">Passport</option>
                            <option value="ssccertificate">SSC Certificate</option>
                            <option value="drivinglicense">Driving License</option>
                        </select><br>
                        <label style="margin-right:189px;">Verification ID</label>
                        <input type="text" name="verificationId" placeholder="Enter Verification ID"><br>
                        <label style="margin-right:158px;">Uplaod Document</label>
                        <input type="file" name="document"><br>
                    </div>
            </fieldset>
            <fieldset>
                <legend>Permanent Address</legend>
                <div class="grid-containerA">
                    <div class="grid-item">
                        <label style="margin-right:117px;">Village/Town</label>
                        <input type="text" name="pervillage" placeholder="Enter Village/Town Name"><br>
                        <label style="margin-right:132px;">Post Office</label>
                        <input type="text" name="perpostoffice" placeholder="Enter Post Office Name"><br>
                    </div>
                    <div class="grid-item">
                        <label style="margin-right:70px;">Police Station Name</label>
                        <input type="text" name="perpolicestation" placeholder="Enter Police Station Name"><br>
                        <label style="margin-right:85px;">Post Code (if any)</label>
                        <input type="text" name="perpostcode" placeholder="Enter Post Code"><br>
                    </div>
                    <div class="grid-item">
                        <label style="margin-right:102px;">District</label>
                        <input type="text" name="perdistrict" placeholder="Enter District Name"><br>
                        <label style="margin-right:73px;">Contact No</label>
                        <input type="tel" name="percontactnumber" placeholder="Enter Contact Number"><br>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Present Address</legend>
                <div class="grid-containerA">
                    <div class="grid-item">
                        <label style="margin-right:117px;">Village/Town</label>
                        <input type="text" name="previllage" placeholder="Enter Village/Town Name"><br>
                        <label style="margin-right:132px;">Post Office</label>
                        <input type="text" name="prepostoffice" placeholder="Enter Post Office Name"><br>
                    </div>
                    <div class="grid-item">
                        <label style="margin-right:70px;">Police Station Name</label>
                        <input type="text" name="prepolicestation" placeholder="Enter Police Station Name"><br>
                        <label style="margin-right:85px;">Post Code (if any)</label>
                        <input type="text" name="prepostcode" placeholder="Enter Post Code"><br>
                    </div>
                    <div class="grid-item">
                        <label style="margin-right:102px;">District</label>
                        <input type="text" name="predistrict" placeholder="Enter District Name"><br>
                        <label style="margin-right:73px;">Contact No</label>
                        <input type="tel" name="precontactnumber" placeholder="Enter Contact Number"><br>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Bank Information</legend>
                <div class="grid-containerA">
                    <div class="grid-item">
                        <label style="margin-right:125px;">Bank Name</label>
                        <input type="text" name="bankname" placeholder="Enter Bank Name">
                    </div>
                    <div class="grid-item">
                        <label style="margin-right:120px;">Bank Branch</label>
                        <input type="text" name="bankbranch" placeholder="Enter Bank Branch">
                    </div>
                    <div class="grid-item">
                        <label style="margin-right:50px;">Bank Account</label>
                        <input type="text" name="bankaccount" placeholder="Enter Bank Account Number">
                    </div>
                </div>
            </fieldset>
            <button class="btnB" type="submit" name="submit">Submit</button>
        </form>
        <fieldset v-else-if="step==1">
            <legend>Mobile Number</legend>
            <div class="grid-containerA">
                <div class="grid-item">
                    <label style="margin-right:117px;">Mobile Number</label>
                    <input type="text" v-model="MobileNo" placeholder="Enter Mobile Number"><br>
                    <span v-if="errors.hasOwnProperty('MobileNo')" style="color:red">{{errors.MobileNo[0]}}</span>
                    <button @click.prevent="requestOTP">Send</button>
                </div>
            </div>
        </fieldset>
        <fieldset v-else="step==2">
            <legend>OTP</legend>
            <div class="grid-containerA">
                <div class="grid-item">
                    <label style="margin-right:117px;">OTP</label>
                    <input type="text" v-model="OTP" placeholder="Enter OTP Number"><br>
                    <span v-if="errors.hasOwnProperty('OTP')" style="color:red">{{errors.OTP[0]}}</span>
                    <button @click.prevent="validateOTP">Send</button>
                </div>
            </div>
        </fieldset>
    </div>

<?php

    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
