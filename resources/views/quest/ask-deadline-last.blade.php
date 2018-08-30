@extends('layouts.current-template')

    @section('title')

    Set Price

    @endsection

    @section('content')


<script type="text/javascript">

    function incrementValue()
    {
        var value =  document.getElementById('price').value ;

        value = isNaN(value) ? 0 : value;
        if(value < 550){
            value++;
        }

        document.getElementById('price').value =  value;
    }
    function decrementValue()
    {
        var value =document.getElementById('price').value;
        value = isNaN(value) ? 0 : value;
        if(value > calculate_price())
        {
            value--;
        }

        document.getElementById('price').value =  value;
    }
    function minmax(value, min, max)
    {
        //set max price

        if(parseInt(value) < min || isNaN(parseInt(value)))
            return value;
        else if(parseInt(value) > max)
            return 2300;
        else return value;
    }
    window.onload= function(){
      {
        document.getElementById("price").value = Number(20);
      }
    };
    //find the maximum dates
    function diff_minutes(dt2, dt1) 
         {

          var diff =(dt2.getTime() - dt1.getTime()) / 1000;
          diff /= 60;
          return Math.abs(Math.round(diff/60));
          
         }

    function calculate_price()
    {

                
        var pages = Number(document.getElementById("page_num").value);

        var base_price = Number(20);

        if($("#academic_level").val() == 'phd' )
        {
            base_price *= 3.0;
        }
        if($("#academic_level").val() == 'masters' )
        {
            base_price *= 2.0;
        }
        if($("#academic_level").val() == 'senior' )
        {
            base_price *= 2.0;
        }
        if($("#academic_level").val() == 'junior' )
        {
            base_price *= 1.5;
        }
        if($("#academic_level").val() == 'highschool' )
        {
            base_price *= 1.7;
        }
        if($("#academic_level").val()== 'other' )
        {
            base_price *= 1;
        }


        if(document.querySelector('input[name="urgency"]:checked').value == 'very_high' )
        {
            base_price += Number(6) *pages;
        }
        if(document.querySelector('input[name="urgency"]:checked').value == 'high' )
        {
            base_price += Number(5) *pages;
        }
        if(document.querySelector('input[name="urgency"]:checked').value == 'medium')
        {
            base_price += Number(4) *pages;
        }
        if(document.querySelector('input[name="urgency"]:checked').value == 'low' )
        {
            base_price += Number (3) *pages;
        }


        //single or double

        if(document.querySelector('input[name="spacing"]:checked').value == '2' )
        {
            base_price = base_price;
        }
        else 
        {
            base_price = 2 * base_price;
        }

        var date    = new Date(); 
        var value_deadline = 0;
        
        var end_date    =  new Date(document.getElementById('datetimepicker4').value);

        var diff = Math.round(diff_minutes(date, end_date));

        if(diff < 3)
        {
            base_price *=Number(1.5);
        }
        if(diff < 6) 
        {
            base_price *= Number(1.4)
        }
        if(diff < 12)
        {
            base_price *= Number(1.3)
        }
        else{
            base_price = base_price;
        }

       

        document.getElementById("price").value = '$ '+ base_price;  

    }

    function tutor_price_calc()

    {
        var amount = 0;
        var pages = Number(document.getElementById("page_num").value);

        if(diff < 3)
        {
            amount = 5.5* pages
        }

         if(diff < 6)
        {
            amount = 5.0* pages
        }

         if(diff < 10)
        {
            amount = 4.5* pages
        }
         if(diff < 15)
        {
            amount = 4.0 * pages
        }
         if(diff < 20)
        {
            amount = 3.5* pages
        }
        else
        {
            amount = 3.0* pages
        }

        return amount;

    }


</script>

        <!-- Card Light -->
        <div class="card">

          <!-- Card image -->
          <div class="view overlay clearfix">
            

                  <!-- Card content -->
                  <div class="card-body">
                    <!-- Title -->
                    <h3 class="card-title text-center">Complete the Question Details</h3>
                      <hr class="my-4">
                    <!-- Link -->
                </div>
            <div class="col-md-11" style="text-align: center; margin-bottom:70px;" >
            <form method="post" action="{{route('PostQuestionPrice')}}"  >

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

    

                        <div class="row">
                            <!--Panel-->
                            <div class="col-sm-6 text-left">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Paper Formating</h3>
                                        <div class="radio">
                                            <label><input type="radio" value="APA" name="paper_format">APA</label>
                                            </div>
                                            <div class="radio">
                                              <label><input type="radio" value="MLA" name="paper_format">MLA</label>
                                            </div>
                                            <div class="radio">
                                              <label><input type="radio" value="Chicago" name="paper_format">Chicago</label>
                                            </div>
                                            <div class="radio">
                                              <label><input type="radio" value="Harvard" name="paper_format">Harvard</label>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.Panel-->

                            <!--Panel-->
                            <div class="col-sm-6 text-left">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Urgency</h3>
                                        <div class="radio">
                                          <label><input type="radio" id="urg" value="low" name="urgency">Low</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" id="urg" value="medium" name="urgency">Medium</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" id="urg" value="high" name="urgency">High</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" id="urg" value="very_high" name="urgency">Very High</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.Panel-->

                            <!--Panel-->
                            <div class="col-sm-12 " style="margin: 20px; margin-left: 0px;">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h3 class="card-title">Other details</h3>
                                        <div class="form-group">
                                             <label class="col-md-4">No. of Pages </label>
                                             <div class="col-md-8"> 

                                            <select title="page_num" id="page_num" class="form-control" name="pagenum" onchange="">                                   
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
                                                    <option value="11">11 pages/approx 3025 words</option>
                                                    <option value="12">12 pages/approx 3300 words</option>
                                                    <option value="13">13 pages/approx 3575 words</option>
                                                    <option value="14">14 pages/approx 3850 words</option>
                                                    <option value="15">15 pages/approx 4125 words</option>
                                                    <option value="16">16 pages/approx 4400 words</option>
                                                    <option value="17">17 pages/approx 4675 words</option>
                                                    <option value="18">18 pages/approx 4950 words</option>
                                                    <option value="19">19 pages/approx 5225 words</option>
                                                    <option value="20">20 pages/approx 5500 words</option>
                                                    <option value="21">21 pages/approx 5775 words</option>
                                                    <option value="22">22 pages/approx 6050 words</option>
                                                    <option value="23">23 pages/approx 6325 words</option>
                                                    <option value="24">24 pages/approx 6600 words</option>
                                                    <option value="25">25 pages/approx 6875 words</option>
                                                    <option value="26">26 pages/approx 7150 words</option>
                                                    <option value="27">27 pages/approx 7425 words</option>
                                                    <option value="28">28 pages/approx 7700 words</option>
                                                    <option value="29">29 pages/approx 7975 words</option>
                                                    <option value="30">30 pages/approx 8250 words</option>
                                                    <option value="31">31 pages/approx 8525 words</option>
                                                    <option value="32">32 pages/approx 8800 words</option>
                                                    <option value="33">33 pages/approx 9075 words</option>
                                                    <option value="34">34 pages/approx 9350 words</option>
                                                    <option value="35">35 pages/approx 9625 words</option>
                                                    <option value="36">36 pages/approx 9900 words</option>
                                                    <option value="37">37 pages/approx 10175 words</option>
                                                    <option value="38">38 pages/approx 10450 words</option>
                                                    <option value="39">39 pages/approx 10725 words</option>
                                                    <option value="40">40 pages/approx 11000 words</option>
                                                    <option value="41">41 pages/approx 11275 words</option>
                                                    <option value="42">42 pages/approx 11550 words</option>
                                                    <option value="43">43 pages/approx 11825 words</option>
                                                    <option value="44">44 pages/approx 12100 words</option>
                                                    <option value="45">45 pages/approx 12375 words</option>
                                                    <option value="46">46 pages/approx 12650 words</option>
                                                    <option value="47">47 pages/approx 12925 words</option>
                                                    <option value="48">48 pages/approx 13200 words</option>
                                                    <option value="49">49 pages/approx 13475 words</option>
                                                    <option value="50">50 pages/approx 13750 words</option>
                                                    <option value="51">51 pages/approx 14025 words</option>
                                                    <option value="52">52 pages/approx 14300 words</option>
                                                    <option value="53">53 pages/approx 14575 words</option>
                                                    <option value="54">54 pages/approx 14850 words</option>
                                                    <option value="55">55 pages/approx 15125 words</option>
                                                    <option value="56">56 pages/approx 15400 words</option>
                                                    <option value="57">57 pages/approx 15675 words</option>
                                                    <option value="58">58 pages/approx 15950 words</option>
                                                    <option value="59">59 pages/approx 16225 words</option>
                                                    <option value="60">60 pages/approx 16500 words</option>
                                                    <option value="61">61 pages/approx 16775 words</option>
                                                    <option value="62">62 pages/approx 17050 words</option>
                                                    <option value="63">63 pages/approx 17325 words</option>
                                                    <option value="64">64 pages/approx 17600 words</option>
                                                    <option value="65">65 pages/approx 17875 words</option>
                                                    <option value="66">66 pages/approx 18150 words</option>
                                                    <option value="67">67 pages/approx 18425 words</option>
                                                    <option value="68">68 pages/approx 18700 words</option>
                                                    <option value="69">69 pages/approx 18975 words</option>
                                                    <option value="70">70 pages/approx 19250 words</option>
                                                    <option value="71">71 pages/approx 19525 words</option>
                                                    <option value="72">72 pages/approx 19800 words</option>
                                                    <option value="73">73 pages/approx 20075 words</option>
                                                    <option value="74">74 pages/approx 20350 words</option>
                                                    <option value="75">75 pages/approx 20625 words</option>
                                                    <option value="76">76 pages/approx 20900 words</option>
                                                    <option value="77">77 pages/approx 21175 words</option>
                                                    <option value="78">78 pages/approx 21450 words</option>
                                                    <option value="79">79 pages/approx 21725 words</option>
                                                    <option value="80">80 pages/approx 22000 words</option>
                                                    <option value="81">81 pages/approx 22275 words</option>
                                                    <option value="82">82 pages/approx 22550 words</option>
                                                    <option value="83">83 pages/approx 22825 words</option>
                                                    <option value="84">84 pages/approx 23100 words</option>
                                                    <option value="85">85 pages/approx 23375 words</option>
                                                    <option value="86">86 pages/approx 23650 words</option>
                                                    <option value="87">87 pages/approx 23925 words</option>
                                                    <option value="88">88 pages/approx 24200 words</option>
                                                    <option value="89">89 pages/approx 24475 words</option>
                                                    <option value="90">90 pages/approx 24750 words</option>
                                                    <option value="91">91 pages/approx 25025 words</option>
                                                    <option value="92">92 pages/approx 25300 words</option>
                                                    <option value="93">93 pages/approx 25575 words</option>
                                                    <option value="94">94 pages/approx 25850 words</option>
                                                    <option value="95">95 pages/approx 26125 words</option>
                                                    <option value="96">96 pages/approx 26400 words</option>
                                                    <option value="97">97 pages/approx 26675 words</option>
                                                    <option value="98">98 pages/approx 26950 words</option>
                                                    <option value="99">99 pages/approx 27225 words</option>
                                                    <option value="100">100 pages/approx 27500 words</option>
                                                    <option value="101">101 pages/approx 27775 words</option>
                                                    <option value="102">102 pages/approx 28050 words</option>
                                                    <option value="103">103 pages/approx 28325 words</option>
                                                    <option value="104">104 pages/approx 28600 words</option>
                                                    <option value="105">105 pages/approx 28875 words</option>
                                                    <option value="106">106 pages/approx 29150 words</option>
                                                    <option value="107">107 pages/approx 29425 words</option>
                                                    <option value="108">108 pages/approx 29700 words</option>
                                                    <option value="109">109 pages/approx 29975 words</option>
                                                    <option value="110">110 pages/approx 30250 words</option>
                                                    <option value="111">111 pages/approx 30525 words</option>
                                                    <option value="112">112 pages/approx 30800 words</option>
                                                    <option value="113">113 pages/approx 31075 words</option>
                                                    <option value="114">114 pages/approx 31350 words</option>
                                                    <option value="115">115 pages/approx 31625 words</option>
                                                    <option value="116">116 pages/approx 31900 words</option>
                                                    <option value="117">117 pages/approx 32175 words</option>
                                                    <option value="118">118 pages/approx 32450 words</option>
                                                    <option value="119">119 pages/approx 32725 words</option>
                                                    <option value="120">120 pages/approx 33000 words</option>
                                                    <option value="121">121 pages/approx 33275 words</option>
                                                    <option value="122">122 pages/approx 33550 words</option>
                                                    <option value="123">123 pages/approx 33825 words</option>
                                                    <option value="124">124 pages/approx 34100 words</option>
                                                    <option value="125">125 pages/approx 34375 words</option>
                                                    <option value="126">126 pages/approx 34650 words</option>
                                                    <option value="127">127 pages/approx 34925 words</option>
                                                    <option value="128">128 pages/approx 35200 words</option>
                                                    <option value="129">129 pages/approx 35475 words</option>
                                                    <option value="130">130 pages/approx 35750 words</option>
                                                    <option value="131">131 pages/approx 36025 words</option>
                                                    <option value="132">132 pages/approx 36300 words</option>
                                                    <option value="133">133 pages/approx 36575 words</option>
                                                    <option value="134">134 pages/approx 36850 words</option>
                                                    <option value="135">135 pages/approx 37125 words</option>
                                                    <option value="136">136 pages/approx 37400 words</option>
                                                    <option value="137">137 pages/approx 37675 words</option>
                                                    <option value="138">138 pages/approx 37950 words</option>
                                                    <option value="139">139 pages/approx 38225 words</option>
                                                    <option value="140">140 pages/approx 38500 words</option>
                                                    <option value="141">141 pages/approx 38775 words</option>
                                                    <option value="142">142 pages/approx 39050 words</option>
                                                    <option value="143">143 pages/approx 39325 words</option>
                                                    <option value="144">144 pages/approx 39600 words</option>
                                                    <option value="145">145 pages/approx 39875 words</option>
                                                    <option value="146">146 pages/approx 40150 words</option>
                                                    <option value="147">147 pages/approx 40425 words</option>
                                                    <option value="148">148 pages/approx 40700 words</option>
                                                    <option value="149">149 pages/approx 40975 words</option>
                                                    <option value="150">150 pages/approx 41250 words</option>
                                                    <option value="151">151 pages/approx 41525 words</option>
                                                    <option value="152">152 pages/approx 41800 words</option>
                                                    <option value="153">153 pages/approx 42075 words</option>
                                                    <option value="154">154 pages/approx 42350 words</option>
                                                    <option value="155">155 pages/approx 42625 words</option>
                                                    <option value="156">156 pages/approx 42900 words</option>
                                                    <option value="157">157 pages/approx 43175 words</option>
                                                    <option value="158">158 pages/approx 43450 words</option>
                                                    <option value="159">159 pages/approx 43725 words</option>
                                                    <option value="160">160 pages/approx 44000 words</option>
                                                    <option value="161">161 pages/approx 44275 words</option>
                                                    <option value="162">162 pages/approx 44550 words</option>
                                                    <option value="163">163 pages/approx 44825 words</option>
                                                    <option value="164">164 pages/approx 45100 words</option>
                                                    <option value="165">165 pages/approx 45375 words</option>
                                                    <option value="166">166 pages/approx 45650 words</option>
                                                    <option value="167">167 pages/approx 45925 words</option>
                                                    <option value="168">168 pages/approx 46200 words</option>
                                                    <option value="169">169 pages/approx 46475 words</option>
                                                    <option value="170">170 pages/approx 46750 words</option>
                                                    <option value="171">171 pages/approx 47025 words</option>
                                                    <option value="172">172 pages/approx 47300 words</option>
                                                    <option value="173">173 pages/approx 47575 words</option>
                                                    <option value="174">174 pages/approx 47850 words</option>
                                                    <option value="175">175 pages/approx 48125 words</option>
                                                    <option value="176">176 pages/approx 48400 words</option>
                                                    <option value="177">177 pages/approx 48675 words</option>
                                                    <option value="178">178 pages/approx 48950 words</option>
                                                    <option value="179">179 pages/approx 49225 words</option>
                                                    <option value="180">180 pages/approx 49500 words</option>
                                                    <option value="181">181 pages/approx 49775 words</option>
                                                    <option value="182">182 pages/approx 50050 words</option>
                                                    <option value="183">183 pages/approx 50325 words</option>
                                                    <option value="184">184 pages/approx 50600 words</option>
                                                    <option value="185">185 pages/approx 50875 words</option>
                                                    <option value="186">186 pages/approx 51150 words</option>
                                                    <option value="187">187 pages/approx 51425 words</option>
                                                    <option value="188">188 pages/approx 51700 words</option>
                                                    <option value="189">189 pages/approx 51975 words</option>
                                                    <option value="190">190 pages/approx 52250 words</option>
                                                    <option value="191">191 pages/approx 52525 words</option>
                                                    <option value="192">192 pages/approx 52800 words</option>
                                                    <option value="193">193 pages/approx 53075 words</option>
                                                    <option value="194">194 pages/approx 53350 words</option>
                                                    <option value="195">195 pages/approx 53625 words</option>
                                                    <option value="196">196 pages/approx 53900 words</option>
                                                    <option value="197">197 pages/approx 54175 words</option>
                                                    <option value="198">198 pages/approx 54450 words</option>
                                                    <option value="199">199 pages/approx 54725 words</option>
                                                    <option value="200">200 pages/approx 55000 words</option>

                                                </select>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                             <label class="col-md-4">Academic Area </label>
                                             <div class="col-md-8"> 

                                            <select title="Subject area" class="form-control" name="order_subject" onchange="">
                                                    <option selected="selected" value="10">Art</option>
    
                                                        <option value="12">&nbsp;&nbsp;Architecture</option>
                                                        <option value="15">&nbsp;&nbsp;Dance</option>
                                                        <option value="17">&nbsp;&nbsp;Design Analysis</option>
                                                        <option value="13">&nbsp;&nbsp;Drama</option>
                                                        <option value="16">&nbsp;&nbsp;Movies</option>
                                                        <option value="18">&nbsp;&nbsp;Music</option>
                                                        <option value="11">&nbsp;&nbsp;Paintings</option>
                                                        <option value="14">&nbsp;&nbsp;Theatre</option>
                                                        <option value="112">Biology</option>
                                                        <option value="52">Business</option>
                                                        <option value="111">Chemistry</option>
                                                        <option value="102">Communications and Media</option>
                                                        <option value="105">&nbsp;&nbsp;Advertising</option>
                                                        <option value="107">&nbsp;&nbsp;Communication Strategies</option>
                                                        <option value="103">&nbsp;&nbsp;Journalism</option>
                                                        <option value="104">&nbsp;&nbsp;Public Relations</option>
                                                        <option value="115">Creative writing</option>
                                                        <option value="53">Economics</option>
                                                        <option value="60">&nbsp;&nbsp;Accounting</option>
                                                        <option value="61">&nbsp;&nbsp;Case Study</option>
                                                        <option value="58">&nbsp;&nbsp;Company Analysis</option>
                                                        <option value="62">&nbsp;&nbsp;E-Commerce</option>
                                                        <option value="59">&nbsp;&nbsp;Finance</option>
                                                        <option value="57">&nbsp;&nbsp;Investment</option>
                                                        <option value="63">&nbsp;&nbsp;Logistics</option>
                                                        <option value="64">&nbsp;&nbsp;Trade</option>
                                                        <option value="87">Education</option>
                                                        <option value="93">&nbsp;&nbsp;Application Essay</option>
                                                        <option value="89">&nbsp;&nbsp;Education Theories</option>
                                                        <option value="88">&nbsp;&nbsp;Pedagogy</option>
                                                        <option value="90">&nbsp;&nbsp;Teacher's Career</option>
                                                        <option value="67">Engineering</option>
                                                        <option value="9">English</option>
                                                        <option value="24">Ethics</option>
                                                        <option value="36">History</option>
                                                        <option value="38">&nbsp;&nbsp;African-American Studies</option>
                                                        <option value="37">&nbsp;&nbsp;American History</option>
                                                        <option value="42">&nbsp;&nbsp;Asian Studies</option>
                                                        <option value="41">&nbsp;&nbsp;Canadian Studies</option>
                                                        <option value="44">&nbsp;&nbsp;East European Studies</option>
                                                        <option value="45">&nbsp;&nbsp;Holocaust</option>
                                                        <option value="40">&nbsp;&nbsp;Latin-American Studies</option>
                                                        <option value="39">&nbsp;&nbsp;Native-American Studies</option>
                                                        <option value="43">&nbsp;&nbsp;West European Studies</option>
                                                        <option value="47">Law</option>
                                                        <option value="49">&nbsp;&nbsp;Criminology</option>
                                                        <option value="48">&nbsp;&nbsp;Legal Issues</option>
                                                        <option value="7">Linguistics</option>
                                                        <option value="2">Literature</option>
                                                        <option value="4">&nbsp;&nbsp;American Literature</option>
                                                        <option value="5">&nbsp;&nbsp;Antique Literature</option>
                                                        <option value="6">&nbsp;&nbsp;Asian Literature</option>
                                                        <option value="3">&nbsp;&nbsp;English Literature</option>
                                                        <option value="116">&nbsp;&nbsp;Shakespeare Studies</option>
                                                        <option value="54">Management</option>
                                                        <option value="56">Marketing</option>
                                                        <option value="51">Mathematics</option>
                                                        <option value="94">Medicine and Health</option>
                                                        <option value="99">&nbsp;&nbsp;Alternative Medicine</option>
                                                        <option value="97">&nbsp;&nbsp;Healthcare</option>
                                                        <option value="101">&nbsp;&nbsp;Nursing</option>
                                                        <option value="95">&nbsp;&nbsp;Nutrition</option>
                                                        <option value="100">&nbsp;&nbsp;Pharmacology</option>
                                                        <option value="96">&nbsp;&nbsp;Sport</option>
                                                        <option value="78">Nature</option>
                                                        <option value="85">&nbsp;&nbsp;Agricultural Studies</option>
                                                        <option value="113">&nbsp;&nbsp;Anthropology</option>
                                                        <option value="86">&nbsp;&nbsp;Astronomy</option>
                                                        <option value="83">&nbsp;&nbsp;Environmental Issues</option>
                                                        <option value="79">&nbsp;&nbsp;Geography</option>
                                                        <option value="80">&nbsp;&nbsp;Geology</option>
                                                        <option value="28">Philosophy</option>
                                                        <option value="110">Physics</option>
                                                        <option value="29">Political Science</option>
                                                        <option value="21">Psychology</option>
                                                        <option value="108">Religion and Theology</option>
                                                        <option value="22">Sociology</option>
                                                        <option value="65">Technology</option>
                                                        <option value="71">&nbsp;&nbsp;Aeronautics</option>
                                                        <option value="70">&nbsp;&nbsp;Aviation</option>
                                                        <option value="72">&nbsp;&nbsp;Computer Science</option>
                                                        <option value="73">&nbsp;&nbsp;Internet</option>
                                                        <option value="75">&nbsp;&nbsp;IT Management</option>
                                                        <option value="77">&nbsp;&nbsp;Web Design</option>
                                                        <option value="114">Tourism</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                             <label class="col-md-4">Type of Document </label>
                                             <div class="col-md-8"> 

                                            <select title="paper_type" class="form-control" name="paper_type">
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
                                                <option value="12">Dissertation Chapter - Abstract</option>
                                                <option value="13">Dissertation Chapter - Introduction Chapter</option>
                                                <option value="14">Dissertation Chapter - Literature Review</option>
                                                <option value="15">Dissertation Chapter - Methodology</option>
                                                <option value="16">Dissertation Chapter - Results</option>
                                                <option value="17">Dissertation Chapter - Discussion</option>
                                                <option value="18">Dissertation Services - Editing</option>
                                                <option value="19">Dissertation Services - Proofreading</option>
                                                <option value="20">Formatting</option>
                                                <option value="21">Admission Services - Admission Essay</option>
                                                <option value="22">Admission Services - Scholarship Essay</option>
                                                <option value="23">Admission Services - Personal Statement</option>
                                                <option value="24">Admission Services - Editing</option>
                                                <option value="25">Editing</option>
                                                <option value="26">Proofreading</option>
                                                <option value="27">Case Study</option>
                                                <option value="28">Lab Report</option>
                                                <option value="29">Speech Presentation</option>
                                                <option value="30">Math Problem</option>
                                                <option value="31">Article</option>
                                                <option value="32">Article Critique</option>
                                                <option value="33">Annotated Bibliography</option>
                                                <option value="34">Reaction Paper</option>
                                                <option value="35">PowerPoint Presentation</option>
                                                <option value="36">Statistics Project</option>
                                                <option value="37">Multiple Choice Questions (None-Time-Framed)</option>
                                                <option value="38">Other (Not listed)</option>

                                                </select>
                                        </div>
                                        </div>
                                                <div class="form-group">
                                                    <label class="col-md-4">Document Spacing  </label>
                                                    <div class="col-md-8">
                                                    <div class="radio">
                                                        <label>
                                                        <input type="radio" value="1" name="spacing">Single
                                                        </label> 
                                                        <label>
                                                            <input type="radio" value="2" name="spacing">Double
                                                        </label>
                                                        
                                                    </div>                                
                                                    </div>
                                            
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4">Paper Style  </label>
                                                    <div class="col-md-8">
                                                <select id="" name="paper_format" class="form-control" size="1">
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
                                                                                                      
                                                    </div>
                                            
                                                </div>

                                                   <div class="form-group">
                                                    <label class="col-md-4">Academic level  </label>
                                                    <div class="col-md-8">
                                                <select id="academic_level" name="academic_level" class="form-control" size="1">
                                                    <option selected="selected" value="phd">PHD</option>
                                                        <option value="masters">Masters (Year > 2)</option>
                                                        <option value="senior">Senior College (Year > 2)</option>
                                                        <option value="junior">Junior College (Yr 1-2)</option>
                                                        <option value="highschool">High School</option>
                                                        <option value="other">Other</option>
                                                        
                                                </select>                                   
                                                                                                      
                                                    </div>
                                            
                                                </div>


                                                 <div class="form-group">
                                                    <label class="col-md-4">Preferred Language  </label>
                                                    <div class="col-md-8">

                                                <select class="form-control" name="lang_style" id="langstyle">
                                                    <option selected="selected" value="1">English (U.S.)</option>
                                                    <option value="2">English (U.K.)</option>
                                                </select>
                                                    </div>
                                            
                                                </div>

     
                                           
                                            <div class="form-group">
                                               @include('part.auto-com')
                                            </div>
                                </div>
                            </div>
                            <!--/.Panel-->
           

                        

                    <div class="card" style="margin-top: 20px; margin-bottom:20px; margin-left: 0px;">
                        <div class="card-body">
                            <h2><strong>What is your Deadline?</strong></h2>
                            <p>Click on the link below to select deadline</p>
                       

                            <div class="row">
                                <div class='col-md-12'>

                                    @include('part.datetimepicker')

                                </div>
                            </div>

                        </div>
                    </div>


                        <div class="card" style="margin-top: 20px; margin-bottom: 20px; margin-left: 0px;">
                             <div class="card-body">
                              <span class="btn btn-primary btn-block" onclick="calculate_price()"><h4>Preview Price </h4> </span>                           
                       </div>
                    </div>

                     <input type="hidden" name="tutor_price" 
                             value="tutor_price_calc()" />



                        <div class="card" style="margin-top: 20px; margin-bottom: 20px; margin-left: 0px;">
                             <div class="card-body">
                              <h3 class="card-title">What is your Price</h3>
                              <p>Use the + and - sign to increase to the agreed price, good prices attract good tutors</p>


                        <div style="font-size:24px;padding-bottom: 20px;"> <button type="button" id="min" onclick="decrementValue()">
                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>
                        </i>
                        <input type="text" id="price" name="question_price" id="price" min="12"
                        onkeyup="this.value = minmax(this.value, 20, 2030)" max="150" value="20" style="text-align: center; font-weight: 800" readonly>
                            <button type="button" id="plus" onclick="incrementValue()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                        </div>


                        </div>
                    </div>
                    <div class="card" style="margin-top: 20px; margin-bottom:20px; margin-left: 0px;">
                             <div class="card-body">
                                 <p><strong>The average question is picked up within 15 minutes
                                Satisfaction is guaranteed. </strong></p>

                        </div>
                    </div>

                        <button type='submit' 
                    
                        class="btn btn-primary btn-md btn-block">
                        <h3>
                            <strong>  Finish
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </strong>
                        </h3></button>
                    </div>
                </form>
            </div>
        <!-- Card Light -->
        </div>
        </div>

        @endsection
