@extends('layouts.frontend')

@section('content')

			<div class="h_btm_bg">
				<div class="wrap">
					<div class="h_btm">
						<div class="header-para">
							<img src="{{asset('assets/home/cpics/welcome.png')}}" />
							<p>Blood is universally recognized as the most precious element that sustains life. It saves innumerable lives across the world in a variety of conditions. blood is great - on any given day, approximately 39,000 units of Red Blood Cells are needed. More than 29 million units of blood components are transfused every year.
								Donate Blood Despite the increase in the number of donors, blood remains in short supply during emergencies, mainly attributed to the lack of information and accessibility.
								We positively believe this tool can overcome most of these challenges by effectively connecting the blood donors with the blood recipients.</p>
						</div>

						<div class="clear"></div>
					</div>
				</div>
			</div>
			@if($image)
			<div class="s_bg">
				<div class="wrap">
					<div class="main_cont">
						<section class="slider">
							<div class="flexslider carousel">
								<ul class="slides">
								@foreach($image as $image_data)
									<li>
										<img src="{{asset('images/image/'.$image_data->image)}}" alt="no image found" />
									</li>
									@endforeach
									
								</ul>
							</div>
						</section>
						@endif
						<div class="ribben">
							<div class="l-triangle-top"></div>
							<div class="l-triangle-bottom"></div>
							<div class="rectangle"></div>
							<div class="r-triangle-top"></div>
							<div class="r-triangle-bottom"></div>
							<div class="clear"></div>
						</div>
						<div class="main">
							<div class="content">
								<h4>Blood bank:</h4>
								<p>We welcome you to in our WebSite. If you are a donor , We appreciate you <a href="{{route('donor_register')}}">signing up</a> online as a Donor. If you need blood we are happy to serve you. This blood donor list is hosted by <a href="{{route('homepage')}}">www.lifesaver.com</a> on behalf of "Blood bank in Nepal"
									as a public service without any profit motive.This is a free service. While the Organisers have taken all steps to obtain accurate and up-to-date information of potential blood donors,
									the Organisers and ICM Computers do not guarantee accuracy of the information contained herein or the suitability of the persons listed as any liability for direct or consequential damage to any person using this blood donor list including
									loss of life or damage due to infection of any nature arising out of blood transfusion from persons whose names have been listed in this website.
									We request donors to update contact details regularly.
									What is the Criteria for Donating Blood?
									What is the Criteria for Donating Blood? Blood donors should be in good health and not suffer from any serious illness. It is very important to ensure that the act of donating blood does not jeopardize the donor's health in any way. Safe blood is blood that does not contain viruses, bacteria, parasites, drugs or other injurious factors that may harm a blood recipient. Donated blood must also not harm the recipient. It must be safe for transfusion to those who need it.</p>
									<div class="row">
            <div class="col-lg-6">
                <h2 style="color:darkkhaki"  style="text-decoration:underline">BLOOD GROUPS</h2>
          <p>  blood group of any human being will mainly fall in any one of the following groups.</p>
                <ul style="text-decoration:underline">
                
<h4 style="color:crimson">

                
<li>1. A positive or A negative</li>
<li>2. B positive or B negative</li>
<li>3. O positive or O negative</li>
<li>4. AB positive or AB negative.</li>
</h4>
				</ul>
				<p>Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. 
					Those with type AB blood are called "universal recipients" because they can receive blood of any type.
					A healthy diet helps ensure a successful blood donation, and also makes you feel better!</p>
				</div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="{{asset('assets/home/images/blood-donor (1).jpg')}}" alt="">
            </div>
        </div>
								</div>
								@if($news)
							
							<div class="sidebar">
								<h2>latest news</h2>
								
								<div class="blog_posts">
								
								
								
									<marquee direction="up" scrolldelay="300">
									@foreach($news as $news_data)
									<br><br>
										<table> 
											<tr>
												<td>
												

													<div class="blog_desc">
												
														<div class="blog_heading">
														
																									
														
															<td>
																@if($news_data->image != null && file_exists(public_path().'/images/news/'.$news_data->image) )
															<img width="350" src="{{ asset('images/news/'.$news_data->image)}}" alt="" class="img img-responsive img-thumbnail" >
															@else 
															<h4>No image found</h4>   
															@endif
															</td>
															<span style="font-weight:bold"><b><i>{{ $news_data->title}}</i></b>
															</span>
															
															<p>Location: {{$news_data->location}}</p>
															<p>Contact: {{$news_data->contact}}</p>

														<span ><b>on: {{ $news_data->news_date}}</b>
															<p>Description: {{ $news_data->description}}</p>
														</span>
														
														</div>
														
													</div>

												
												</td>
											</tr>

										</table>
										@endforeach
									</marquee>
									
									

									<div class="clear"></div>
								</div>
								

							</div>
						
							@endif
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="clear"></div>


	


		@endsection