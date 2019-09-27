@extends('layouts.frontend')

@section('content')

@if($camp)

<div style="height:00px; width:100%; margin:auto; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
  <div class="s_bg">
    <div class="wrap">
      <div class="main_cont">
        <div class="main">
          <div class="content">
            <img src="{{ asset('assets/home/Images/camps.png')}}" height="80px" style="margin:auto" />
            <br /><br />



            <table cellpadding="0" cellspacing="0" width="1100px">

            <?php
              $n=0 
              ?>
              @if($n%2==0)

              <tr>
                @endif
                <td>
                @foreach($camp as $key=>$value)
                  <table cellpadding="0" cellspacing="0" class="tableborder" width="auto" style="border:none; text-align:center">
                    <tr>
                      <td style="font-size:28px; font-weight:bold; text-shadow:1px 1px 6px browm; padding-left:50px; padding-top:10px; padding-bottom:10px; color:#925959"></td>
                    </tr>
                    <tr>
                      <td align="center">
                        <a href="{{ asset('images/camps/'.$value->image)}}" data-lightbox="image-1"> <img src="{{ asset('images/camps/'.$value->image)}}" width="800" height="auto" style="margin:auto; padding-left:200px" /></a></td>
                    </tr>

                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="title" style="text-align:center"><a href="{{route('camp_galleries',$value->id)}}">View Camp Gallary</td>
                    </tr>





                    <tr>
                      <td class="title" style="vertical-align:middle; text-align:center">Organised By: {{ $value->organized_by}} </td>
                      <td align="left" width="50%"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="title" style="vertical-align:middle; text-align:center">Address: {{ $value->address}} </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="title" style="vertical-align:middle; text-align:center">Date: {{ $value->on}} </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="title" style="vertical-align:middle; text-align:center">Details: {{ $value->details}} </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <p style="padding-left:30px; font-size:16px; font-weight:bold"></p>
                      </td>
                    </tr>

                  </table>
                  <br><br>
                  @endforeach
                </td>
                  <?php
                  if ($n%2==1) {
                    ?>

                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
              <?php
              }
              $n=$n+1;

              ?>


            </table>


          </div>
        </div>
      </div>
    </div>
  </div>

  @else
  <h3>No camp found</h3>
  <br><br><br><br><br><br><br><br><br><br><br><br>
  @endif


  @endsection