@extends('layouts.frontend')

@section('content')

@if($camp_images->count() > 0)

<div style="height:400px; width:100%; margin:auto; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
    <div class="s_bg">
<div class="wrap">
<div class="main_cont">
     <div class="main">
        <div class="content">
         
            <table cellpadding="0" cellspacing="0" width="1000px" class="tableborder" style="margin:auto" >
         <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3" align="center"><img src="{{asset('assets/home/Images/gallery.png')}}" height="80px" /></td></tr>
         <tr><td colspan="3">&nbsp;</td></tr>  

         <?php
	$n=0;
		if($n%3==0)
		{
		?>
    
    
            <tr>
            <?php
			
		}?>
            
            
            <td>

            
        
           
            
@foreach($camp_images as $key=>$value)
  <a href="{{asset('images/camps/'.$value->other_images)}}" data-lightbox="roadtrip"><img src="{{asset('images/camps/'.$value->other_images)}}" width="250px" height="200px" style="padding-left:40px" /></a>
  @endforeach
    </td>
        <?php
        if($n%3==2)
	 {
	 ?>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
         <tr><td colspan="3">&nbsp;</td></tr>
          <tr><td colspan="3">&nbsp;</td></tr>
        
        <?php
	}
	$n=$n+1;
		
?>
    </table>
        
        
    </div></div></div></div></div>
    
    




@else
    <h3 style="text-align:center">Sorry, No image found</h3>
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <br><br><br><br><br>
@endif

@endsection