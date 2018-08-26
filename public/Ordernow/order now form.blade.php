tion="https://americanwritinghelp.com/place-order/" method="post" name="placeOrderForm" id="placeOrderForm">
<div class="orderform">
<div class="the_order_pane">
<table width="95%" align="center">
<tbody><tr><td colspan="2" class="sec_titles">Custom Paper Details</td> </tr>
  <tr><td colspan="2">&nbsp;</td> </tr> 
  <tr>
    <td width="212"><label for="topic">Topic:<font color="reqStar"><strong>&nbsp;*</strong></font></label>	</td>
    <td width="974"><input id="topic" name="topic" maxlength="256" class="required valid" size="50" type="text">	</td>
  </tr>
  <tr>
    <td><label for="subjectarea">Subject area:<font color="reqStar"><strong>&nbsp;*</strong></font></label></td>
    <td>
	<div><select title="Subject area" class="required valid" name="order_category" onchange="javascript:doOrderFormCalculation();">
    <option selected="selected" value="10">Art</option>
	
														<option value="12">&nbsp;&nbsp;Architecture</option>
														<option value="15">&nbsp;&nbsp;Dance</option>
														<option value="17">&nbsp;&nbsp;Design Analysis</option>
														<option value="13">&nbsp;&nbsp;Drama</option>
														<option value="16">&nbsp;&nbsp;Movies</option>
														<option value="18">&nbsp;&nbsp;Music</option>
														<option value="11">&nbsp;&nbsp;Paintings</option>
														<option value="14">&nbsp;&nbsp;Theatre</option>
														
						  </select>
			</div>	</td>
    </tr>
  <tr>
    <td><label for="typeofdocument">Type of document:</label></td>
    <td><div>			<select name="doctype_x" id="doctype_x" class="required valid" onchange="javascript:doOrderFormCalculation();">
                            <option selected="selected" value="1">Essay</option>
								<option value="2">Term Paper</option>
								<option value="3">Research Paper</option>
								<option value="4">Coursework</option>
								<option value="5">Book Report</option>
								<option value="6">Book Review</option>
								<option value="7">Movie Review</option>
								<option value="8">Dissertation</option>
								<option value="9">Thesis</option>
								<option value="10">Thesis Proposal</option>
								<option value="11">Research Proposal</option>
								
							</select>
						</div></td>
    </tr>
  <tr>
    <td><label for="numberofpages">Number of pages/words:<font color="reqStar"><strong>&nbsp;*</strong></font></label></td>
    <td><div>			<select title="Number of pages" class="required valid" name="numpages" onchange="javascript:doOrderFormCalculation();">
                         	<option selected="selected" value="1">1 page/approx 275 words</option>
							<option value="2">2 pages/approx 550 words</option>
							<option value="3">3 pages/approx 825 words</option>
							<option value="4">4 pages/approx 1100 words</option>
							<option value="5">5 pages/approx 1375 words</option>
							<option value="6">6 pages/approx 1650 words</option>
							<option value="7">7 pages/approx 1925 words</option>
							<option value="8">8 pages/approx 2200 words</option>
							<option value="9">9 pages/approx 2475 words</option>
							<option value="10">10 pages/approx 2750 words</option>
							
							</select>
						</div>
						<div id="num_pg_ord" style="width:auto; float:left; font-size:12px; display:inline;">approx 275 words per page</div> </td>
    </tr>
  <tr>
    <td><label for="spacing">Spacing:</label></td>
    <td><div>
<input name="o_interval" id="o_interval" value="1" onclick="javascript:doOrderFormCalculation();" type="checkbox">&nbsp;<b>Single spaced</b><br>
<input type="hidden" name="spacing" id="spacing" value="">
					</div></td>
    </tr>
</tbody></table>
<table width="95%" align="center" class="td_borders">
<tbody><tr>
<td width="18%"><label for="urgency">Urgency:</label></td>
<td width="36%"><div>
<select title="Paper urgency" class="required valid" name="urgency" id="urgency" onchange="javascript:doOrderFormCalculation();">
<option selected="selected" value="">choose</option>
<option value="6">6 hours</option>
 <option value="12">12 hours</option>
 <option value="24">24 hours</option>
 <option value="36">36 hours</option>
 <option value="48">48 hours</option>
 <option value="3">3 days</option>
 <option value="5">5 days</option>
 <option value="7">7 days</option>
 <option value="9">9 days</option>
 <option value="10">10 days</option>
 <option value="14">14 days</option>
 <option value="21">21 days</option>
 <option value="30">30 days</option>
 <option value="60">2 Months</option>
 </select>
</div></td>
<td width="46%"><div>
	Written by Top 10 Writers &nbsp;	
	<input id="vas_per_page_0" name="vas_id[]" value="3" onclick="doOrderFormCalculation()" type="checkbox"><b>$2.95/page</b>
    <input type="hidden" name="topwriter" id="topwriter" value="3">
	  </div>
    </td>
  </tr>
<tr><td><label for="academiclevel">Academic Level:</label></td>
<td>
<div>
<select title="Academic level" class="required valid" name="academic_level" id="academic_level" onchange="javascript:doOrderFormCalculation();">
 <option value="1">High School</option>

 <option value="2">College</option>
 <option value="3">Undergraduate </option>
 <option value="4">Master </option>
 <option value="5">PhD </option>
</select> <font size="1">Choose <strong>Urgency</strong> First</font>
<input type="hidden" name="academic_level_txt" id="academic_level_txt" value="Master ">
</div>
</td>
<td></td>
</tr>  
<tr>
    <td><label for="numberofsources">Number of sources/references:</label></td>
    <td><div>
<select id="numberOfSources" name="numberOfSources" size="1" onchange="javascript:doOrderFormCalculation();" class="valid">
<option selected="selected" value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>

</div></td>
    <td><div>VIP support: 
      <input id="vas_per_order_1" name="vas_id[]" value="6" onclick="doOrderFormCalculation()" type="checkbox"> <b>$9.95</b><br>
	  <input type="hidden" name="vip_support" id="vip_support" value="6">
	  </div></td>
  </tr>
  
  <tr>
    <td><label for="style">Style:</label></td>
    <td><div>
<select id="style" name="writing_style" class="required valid" size="1" onchange="javascript:doOrderFormCalculation();">
	<option selected="selected" value="1">APA</option>
	<option value="2">MLA</option>
	<option value="3">Turabian</option>
	<option value="4">Chicago</option>
	<option value="5">Harvard</option>
	<option value="6">Oxford</option>
	<option value="8">Vancouver</option>
	<option value="9">CBE</option>
	<option value="7">Other</option>
</select>	
</div></td>
  </tr>
    <tr>
    <td><label for="style">Currency:</label></td>
    <td><div>
<select name="curr" id="curr" class="required valid" size="1" onchange="javascript:doOrderFormCalculation();">
	 	<option value="1">USD</option>
 		<option value="2">GBP</option>
 		<option value="3">CAD</option>
 		<option value="4">AUD</option>
 		<option value="5">EUR</option>
 		</select>
</div></td>
    <td></td>
  </tr>
  <tr>
    <td>
	<div style="padding: 10px; width:auto; float:right; font-size:18px; font-weight:bold; display:none;"> <span id="cost_per_page" class="readonlyinput">45.9</span></div>
    <!--<div style="padding: 10px; width:auto; float:right; font-size:14px; font-weight:bold;">Minimal Cost / Page : $ 10</div>-->
	</td>
    <td>
	<div style="padding: 10px 5px; font-size:20px; font-weight:bold; float:right;"> Total </div>
    </td>
<td><div class="order_price_totals"> <!--$-->  <span id="total">285.36</span></div> <div style="font-size:12px; width:60%; margin-left:10px; float:right;"> (Kindly select "<strong>Type of Doc</strong>", "<strong>Urgency</strong>" and "<strong>Academic Level</strong>" accordingly)</div></td>
</tr>
 <tr>
 <td><label for="language">Preferred language style:</label></td>
 <td><div>
<select class="required valid" name="langstyle" id="langstyle" onchange="javascript:doOrderFormCalculation();">
<option selected="selected" value="1">English (U.S.)</option>
<option value="2">English (U.K.)</option></select>
</div></td>
<td></td>
</tr>
</tbody></table>
<table width="95%" align="center">
  <tbody><tr>
  <td width="18%"> Track ID</td>
  <td width="82%"><input type="text" name="track_order_id" id="track_order_id" value="" maxlength="10"><span style="font-size:11px;">(Optional- so you can track your orders)</span></td>
</tr>		
  <tr>
    <td><label for="details">Order description:<font color="reqStar"><strong>&nbsp;*</strong></font><br><span class="label_comment">(type your instructions here)</span></label></td>
    <td>
	<div>
	<input type="hidden" name="totals" value="285.36" id="totals" size="12" readonly="" style="text-align:center; height: 30px; width: 130px; font-size: 26px; padding: 2px; margin: 3px;">
	<br>
<textarea id="details" name="details" class="required" rows="5" style="width:400px; resize:none;"></textarea><div id="err_details"></div>
<br>
<div class="file-up">If you have additional files, you will upload them at 'Manage Orders' section.</div>
	</div></td>
  </tr>
 <tr><td colspan="2"> <hr></td></tr>  
 
<tr><td></td>
<td>
<input name="discount_percent_h" id="discount_percent_h" class="discount_percent_h" value="" type="hidden">
<input name="discount_h" value="" type="hidden">						
<input name="lblCustomerSavings" value="" type="hidden"> 
</td>
</tr>
 
  <tr>
    <td>&nbsp;</td>
    <td><label for="allow_night_calls"><b>NEW!</b> I agree to receive phone calls from you at night in case of emergency</label>
    <input id="allow_night_calls" name="allow_night_calls" value="allow_night_calls" size="1" type="checkbox"></td>
  </tr>
</tbody></table><br><table width="95%" align="center" class="td_borders">
<tbody><tr>
  <td colspan="2" class="sec_titles">Sign Up Details</td>
  </tr> 
  <tr>  <td colspan="2">&nbsp;</td> </tr> 
  <tr>
    <td><label for="firstname">First name:<font color="reqStar"><strong>&nbsp;*</strong></font></label></td>
    <td><input id="firstname" name="firstname" class="required" type="text"><div id="err_firstname"></div></td>
    </tr>
  <tr>
    <td><label for="lastname">Last name:<font color="reqStar"><strong>&nbsp;*</strong></font></label></td>
    <td><input id="lastname" name="lastname" class="required" type="text"><div id="err_lastname"></div></td>
    </tr>
  <tr>
    <td><label for="email">Email:<font color="reqStar"><strong>&nbsp;*</strong></font></label></td>
    <td>
<input id="email" name="email" class="required email" type="text" onchange="$(&quot;#checkemail&quot;).html(&quot;Please wait...&quot;); $.get(&quot;../checkuser.php&quot;,{ cmd_email: &quot;checkTheEmail&quot;, user_email: $(&quot;#email&quot;).val() } ,function(data){  $(&quot;#checkemail&quot;).html(data); }); isEmail()"> 
<span style="color:green; font: bold 12px Verdana, Arial, Helvetica, sans-serif;" id="checkemail"></span></td>
    </tr>
  <tr>
	<td><div align="left">Username:<font color="reqStar"><strong>&nbsp;*</strong></font>&nbsp;</div></td>
	<td>
<input name="username" type="text" id="username" class="required username" minlength="6" onchange="$(&quot;#checkid&quot;).html(&quot;Please wait...&quot;); $.get(&quot;../checkuser.php&quot;,{ cmd: &quot;check&quot;, user: $(&quot;#username&quot;).val() } ,function(data){  $(&quot;#checkid&quot;).html(data); }); isValidUsername()"> 
<span style="color:green; font: bold 12px Verdana, Arial, Helvetica, sans-serif;" id="checkid"></span>	</td>
</tr>
<tr>
	<td> <div align="left">Choose a password:<font color="reqStar"><strong>&nbsp;*</strong></font>&nbsp;</div></td>
	<td><input name="pwd" id="pwd" value="" style="width: 200px;" minlength="6" class="required password" type="password"></td>
	</tr>
<tr>
	<td> <div align="left">Re-enter password:<font color="reqStar"><strong>&nbsp;*</strong></font>&nbsp;</div></td>
	<td><input name="pwd2" id="pwd2" style="width: 200px;" class="required password" type="password" minlength="6" equalto="#pwd"></td>
	</tr>  
  <tr>
    <td>Country<font color="reqStar"><strong>&nbsp;*</strong></font></td>
    <td><div>
      <select name="country" class="required" id="country">
        <option value="" selected=""></option>
        <option value="Afghanistan">Afghanistan</option>
        <option value="Albania">Albania</option>
        <option value="Algeria">Algeria</option>
        <option value="Andorra">Andorra</option>
        <option value="Anguila">Anguila</option>
        <option value="Antarctica">Antarctica</option>
        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
        <option value="Argentina">Argentina</option>
        <option value="Armenia ">Armenia </option>
        <option value="Aruba">Aruba</option>
        <option value="Australia">Australia</option>
        <option value="Austria">Austria</option>
        <option value="Azerbaidjan">Azerbaidjan</option>
        <option value="Bahamas">Bahamas</option>
        <option value="Bahrain">Bahrain</option>
        <option value="Bangladesh">Bangladesh</option>
        <option value="Barbados">Barbados</option>
        <option value="Belarus">Belarus</option>
        <option value="Belgium">Belgium</option>
        <option value="Belize">Belize</option>
        <option value="Bermuda">Bermuda</option>
        <option value="Bhutan">Bhutan</option>
        <option value="Bolivia">Bolivia</option>
        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
        <option value="Brazil">Brazil</option>
        <option value="Brunei">Brunei</option>
        <option value="Bulgaria">Bulgaria</option>
        <option value="Cambodia">Cambodia</option>
        <option value="Canada">Canada</option>
        <option value="Cape Verde">Cape Verde</option>
        <option value="Cayman Islands">Cayman Islands</option>
        <option value="Chile">Chile</option>
        <option value="China">China</option>
        <option value="Christmans Islands">Christmans Islands</option>
        <option value="Cocos Island">Cocos Island</option>
        <option value="Colombia">Colombia</option>
        <option value="Cook Islands">Cook Islands</option>
        <option value="Costa Rica">Costa Rica</option>
        <option value="Croatia">Croatia</option>
        <option value="Cuba">Cuba</option>
        <option value="Cyprus">Cyprus</option>
        <option value="Czech Republic">Czech Republic</option>
        <option value="Denmark">Denmark</option>
        <option value="Dominica">Dominica</option>
        <option value="Dominican Republic">Dominican Republic</option>
        <option value="Ecuador">Ecuador</option>
        <option value="Egypt">Egypt</option>
        <option value="El Salvador">El Salvador</option>
        <option value="Estonia">Estonia</option>
        <option value="Falkland Islands">Falkland Islands</option>
        <option value="Faroe Islands">Faroe Islands</option>
        <option value="Fiji">Fiji</option>
        <option value="Finland">Finland</option>
        <option value="France">France</option>
        <option value="French Guyana">French Guyana</option>
        <option value="French Polynesia">French Polynesia</option>
        <option value="Gabon">Gabon</option>
        <option value="Germany">Germany</option>
        <option value="Gibraltar">Gibraltar</option>
        <option value="Georgia">Georgia</option>
        <option value="Greece">Greece</option>
        <option value="Greenland">Greenland</option>
        <option value="Grenada">Grenada</option>
        <option value="Guadeloupe">Guadeloupe</option>
        <option value="Guatemala">Guatemala</option>
        <option value="Guinea-Bissau">Guinea-Bissau</option>
        <option value="Guinea">Guinea</option>
        <option value="Haiti">Haiti</option>
        <option value="Honduras">Honduras</option>
        <option value="Hong Kong">Hong Kong</option>
        <option value="Hungary">Hungary</option>
        <option value="Iceland">Iceland</option>
        <option value="India">India</option>
        <option value="Indonesia">Indonesia</option>
        <option value="Ireland">Ireland</option>
        <option value="Israel">Israel</option>
        <option value="Italy">Italy</option>
        <option value="Jamaica">Jamaica</option>
        <option value="Japan">Japan</option>
        <option value="Jordan">Jordan</option>
        <option value="Kazakhstan">Kazakhstan</option>
        <option value="Kenya">Kenya</option>
        <option value="Kiribati ">Kiribati </option>
        <option value="Kuwait">Kuwait</option>
        <option value="Kyrgyzstan">Kyrgyzstan</option>
        <option value="Lao People&#39;s Democratic Republic">Lao People's 
          Democratic Republic</option>
        <option value="Latvia">Latvia</option>
        <option value="Lebanon">Lebanon</option>
        <option value="Liechtenstein">Liechtenstein</option>
        <option value="Lithuania">Lithuania</option>
        <option value="Luxembourg">Luxembourg</option>
        <option value="Macedonia">Macedonia</option>
        <option value="Madagascar">Madagascar</option>
        <option value="Malawi">Malawi</option>
        <option value="Malaysia ">Malaysia </option>
        <option value="Maldives">Maldives</option>
        <option value="Mali">Mali</option>
        <option value="Malta">Malta</option>
        <option value="Marocco">Marocco</option>
        <option value="Marshall Islands">Marshall Islands</option>
        <option value="Mauritania">Mauritania</option>
        <option value="Mauritius">Mauritius</option>
        <option value="Mexico">Mexico</option>
        <option value="Micronesia">Micronesia</option>
        <option value="Moldavia">Moldavia</option>
        <option value="Monaco">Monaco</option>
        <option value="Mongolia">Mongolia</option>
        <option value="Myanmar">Myanmar</option>
        <option value="Nauru">Nauru</option>
        <option value="Nepal">Nepal</option>
        <option value="Netherlands Antilles">Netherlands Antilles</option>
        <option value="Netherlands">Netherlands</option>
        <option value="New Zealand">New Zealand</option>
        <option value="Niue">Niue</option>
        <option value="North Korea">North Korea</option>
        <option value="Norway">Norway</option>
        <option value="Oman">Oman</option>
        <option value="Pakistan">Pakistan</option>
        <option value="Palau">Palau</option>
        <option value="Panama">Panama</option>
        <option value="Papua New Guinea">Papua New Guinea</option>
        <option value="Paraguay">Paraguay</option>
        <option value="Peru ">Peru </option>
        <option value="Philippines">Philippines</option>
        <option value="Poland">Poland</option>
        <option value="Portugal ">Portugal </option>
        <option value="Puerto Rico">Puerto Rico</option>
        <option value="Qatar">Qatar</option>
        <option value="Republic of Korea Reunion">Republic of Korea Reunion</option>
        <option value="Romania">Romania</option>
        <option value="Russia">Russia</option>
        <option value="Saint Helena">Saint Helena</option>
        <option value="Saint kitts and nevis">Saint kitts and nevis</option>
        <option value="Saint Lucia">Saint Lucia</option>
        <option value="Samoa">Samoa</option>
        <option value="San Marino">San Marino</option>
        <option value="Saudi Arabia">Saudi Arabia</option>
        <option value="Seychelles">Seychelles</option>
        <option value="Singapore">Singapore</option>
        <option value="Slovakia">Slovakia</option>
        <option value="Slovenia">Slovenia</option>
        <option value="Solomon Islands">Solomon Islands</option>
        <option value="South Africa">South Africa</option>
        <option value="Spain">Spain</option>
        <option value="Sri Lanka">Sri Lanka</option>
        <option value="St.Pierre and Miquelon">St.Pierre and Miquelon</option>
        <option value="St.Vincent and the Grenadines">St.Vincent and the 
          Grenadines</option>
        <option value="Sweden">Sweden</option>
        <option value="Switzerland">Switzerland</option>
        <option value="Syria">Syria</option>
        <option value="Taiwan ">Taiwan </option>
        <option value="Tajikistan">Tajikistan</option>
        <option value="Thailand">Thailand</option>
        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
        <option value="Turkey">Turkey</option>
        <option value="Turkmenistan">Turkmenistan</option>
        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
        <option value="Ukraine">Ukraine</option>
        <option value="UAE">UAE</option>
        <option value="UK">UK</option>
        <option value="USA">USA</option>
        <option value="Uruguay">Uruguay</option>
        <option value="Uzbekistan">Uzbekistan</option>
        <option value="Vanuatu">Vanuatu</option>
        <option value="Vatican City">Vatican City</option>
        <option value="Vietnam">Vietnam</option>
        <option value="Virgin Islands (GB)">Virgin Islands (GB)</option>
        <option value="Virgin Islands (U.S.) ">Virgin Islands (U.S.) </option>
        <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
        <option value="Yemen">Yemen</option>
        <option value="Yugoslavia">Yugoslavia</option>
      </select>
    </div>    <label for="country"></label></td>
    </tr>
  <tr>
    <td><label for="phone1">Contact phone #1:<font color="reqStar"><strong>&nbsp;*</strong></font></label></td>
    <td><input id="phone1" name="phone1" type="text" class="required digits" maxlength="15"></td>
	</tr>
  <tr>
    <td><label for="phone2">Contact phone #2:</label></td>
    <td><input id="phone2" name="phone2" type="text" class="digits" maxlength="15"></td>
    </tr>
  </tbody></table><table width="95%" align="center">
    <tbody><tr>
    <td>
<input name="0bb6c36d0203642ba42e79df168efa3a" value="MGJiNmMzNmQwMjAzNjQyYmE0MmU3OWRmMTY4ZWZhM2E=" type="hidden">
<input name="29cece43ba2d4bcaea8c78eb02aea395" value="MjljZWNlNDNiYTJkNGJjYWVhOGM3OGViMDJhZWEzOTU=" type="hidden">
<input name="ee52948c809e658a2e2bfd66f90aef6b" value="ZWU1Mjk0OGM4MDllNjU4YTJlMmJmZDY2ZjkwYWVmNmI=" type="hidden">
<input name="MTIuOTUYGREXGHNMKJGT23467GGFDSSSbbbbbIOK" value="NDUuOQ==" type="hidden">
<input name="MMNBGFREWQASCXZSOPJHGVNMTIuOTU" class="MMNBGFREWQASCXZSOPJHGVNMTIuOTU" value="Mjg1LjM2" type="hidden"></td>
 <td align="right"><div class="preview"><input type="submit" name="doPreview" id="doPreview" class="order_submit" value="Preview"></div></td>
 </tr>
 </tbody></table></div>
</div>
</form>