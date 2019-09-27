@extends('layouts.frontend')

@section('content')




<div class="h_btm_bg">
<div class="wrap">
<div class="h_btm">
<div class="header-para">
<table cellpadding="0" cellspacing="0" width="700px">
  <tr><td><img src="{{asset('assets/home/Images/donor1.png')}}" height="80px" /></td></tr>
   <tr><td>&nbsp;</td></tr>
  <tr><td style="float:left; text-align:justify">

      <p>Donating blood is a simple thing to do, but it can make a big difference in the lives of others. The donation process from the time you arrive until the time you leave takes about 30 minutes. The donation itself is only about 8-10 minutes on average.
The steps in the process are :</p><br />
<h4>Before Donating Blood</h4>
  <p class="top"><ul style="list-style-type:disc; color:#805752" >
<li>Eat something substantial before your appointment.</li>
<li>Have plenty of liquid the day before donation, especially in warm weather. In the 3 hours before donating, have at least 3 to 4 good-sized glasses of water/juice.</li>
</ul></p><br />
<h4>Registration of Donor</h4>
  <p class="top">Our volunteer/staff will ask you to fill a form with brief information on contact details and medical history.</p><br />	
  <h4>Physical Health check-up</h4>
<p class="top">You will be examined by a doctor to answer some questions about your health history.
Your blood pressure and hemoglobin level will be checked.</p><br />	
<h4>Blood Donation</h4>
<p class="top">We will cleanse an area on your arm and insert a brand new sterile needle for the blood draw. This feels like a quick pinch and is over in seconds.</p><br />
<ul style="list-style-type:disc; color:#805752" >
<li>The actual donation takes about 8-10 minutes, during which you will be seated comfortably.</li>
<li>When a unit of blood (350 &#8211; 450 ml) has been collected, the donation is complete.</li>
<li>A staff person will place a bandage on your arm</li>
</ul><br />
<h4>Safety</h4>
<p class="top">All equipment is sterile; needles are used only once and then discarded. In the great majority of individuals, a donation of 450 ml is less than 10% of your total body volume and may be given safely every 3 months. Your body keeps on discarding and replenishing blood all the time whether you give blood or not, so this amount is quickly replenished.</p><br />
<h2>After Donation</h2><br />
<h4>Relax & Refresh</h4>
<p class="top">You can have something to eat and drink in and relax for about 15-20 minutes before departing. Within 24-48 hours your blood volume is completely restored.
Apart from enjoying our refreshments and souvenir, other things to help you recover quickly include</p><br />
<ul style="list-style-type:disc; color:#805752" >
<li>Drink plenty of water, fruit juice etc. and avoid alcohol for 8 hours after you&#8217;ve given blood.</li>
<li>Avoid any strenuous activity or heavy lifting with the &#8216;donating arm&#8217; for 24 hours after you&#8217;ve given blood.</li>
<li>If you become unwell in any way after giving blood, speak to the doctor in-charge straight away.</li>
</ul> <br />
<h4>Donate Blood Again</h4>
<p class="top"><ul style="list-style-type:disc; color:#805752" >
<li>Whole blood donors can give blood again after 3 months.</li>
<li>Apheresis plasma or platelet donors can give blood in around 2-3 weeks time.</li>
</ul></p><br />
<h4>Spread the word</h4>
<p class="top">Tell your friends, colleagues and family about the wonderful feeling you experience on donating blood and saving lives.
<br />Enjoy the feeling of knowing that you helped save precious lives!</p>

      </td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>




           <td style="float:right; padding-bottom:300px; padding-left:0px">  <a href="{{route('donor_register')}}"><img src="{{asset('assets/home/Images/regdonor.png')}}" width="800px" height="350px"  /><br /><br /></br></br><br /><br /><img src="{{asset('assets/home/Images/abot12.png')}}" width="400px" height="540px" /></a></td></tr></table></div></div></div>
                    <br /><br />				
                  
              
      
       	


</div>
</div>



@endsection