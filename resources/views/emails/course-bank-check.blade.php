<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <style type="text/css">
        body {
            color: #777;
            padding: 0;
            margin: 0;
        }

        body,
        table,
        td,
        p,
        a,
        li,
        blockquote {
            -webkit-text-size-adjust: none !important;
            font-style: normal;
            font-weight: 400;
            font-family: 'Roboto', sans-serif;
        }

        @import 'https://fonts.googleapis.com/css?family=Roboto';
        @import 'url(http://fonts.googleapis.com/earlyaccess/notosanskannada.css)';

        button {
            width: 90%;
        }

        p {
            font-size: 13px !important;
            color: #000 !important;
            line-height: normal !important;
            padding-bottom: 14px !important;
            margin: 0px !important;
        }

        .coupon-code {
            font-weight: 600;
            display: inline-block;
            margin: 0;
            padding: 6px 13px 5px;
            border-radius: 50px;
        }

        .coupon-code {
            background: #607D8B;
            color: #fff;
        }

        @media screen and (max-width:600px) {

            /*styling for objects with screen size less than 600px; */
            body,
            table,
            td,
            p,
            a,
            li,
            blockquote {
                -webkit-text-size-adjust: none !important;
            }

            table {
                /* All tables are 100% width */
                width: 100%;
            }

            .footer {
                /* Footer has 2 columns each of 48% width */
                height: auto !important;
                max-width: 48% !important;
                width: 48% !important;
            }

            table.responsiveImage {
                /* Container for images in catalog */
                height: auto !important;
                max-width: 30% !important;
                width: 30% !important;
            }

            table.responsiveContent {
                /* Content that accompanies the content in the catalog */
                height: auto !important;
                max-width: 66% !important;
                width: 66% !important;
            }

            .top {
                /* Each Columnar table in the header */
                height: auto !important;
                max-width: 48% !important;
                width: 48% !important;
            }

            .catalog {
                margin-left: 0% !important;
            }
        }

        @media screen and (max-width:480px) {

            /*styling for objects with screen size less than 480px; */
            body,
            table,
            td,
            p,
            a,
            li,
            blockquote {}

            table {
                /* All tables are 100% width */
                width: 100% !important;
                border-style: none !important;
            }

            .logo_regular {
                width: 150px;
                height: 70px;
                display: block;
            }

            .footer {
                /* Each footer column in this case should occupy 96% width  and 4% is allowed for email client padding*/
                height: auto !important;
                max-width: 96% !important;
                width: 96% !important;
            }

            .table.responsiveImage {
                /* Container for each image now specifying full width */
                height: auto !important;
                max-width: 96% !important;
                width: 96% !important;
            }

            .table.responsiveContent {
                /* Content in catalog  occupying full width of cell */
                height: auto !important;
                max-width: 96% !important;
                width: 96% !important;
            }

            .top {
                /* Header columns occupying full width */
                height: auto !important;
                max-width: 100% !important;
                width: 100% !important;
            }

            .catalog {
                margin-left: 0% !important;
            }

            button {
                width: 90% !important;
            }
        }
    </style>
</head>

<body>
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" style="
                color: #444;
                background-color: #f4f4f4;
                background-repeat: no-repeat;
                background-size: 100% 100%;
                background-position: top center;
            ">
                        <thead style="background-color:#fff;">
                            <tr>
                                @if(File::exists('public/assets/admin/images/'.$data['general_setting']->logo))
                                <th align="left" style="padding: 0 10px">
                                    <a href="http://taflat.com">
                                        {{ HTML::image('public/assets/admin/images/'.$data['general_setting']->logo,null, array('width' => '235','class' => 'logo_regular')) }}
                                    </a>
                                </th>
                                @endif

                                <th style="color: brown; min-width: 100px;">
                                    {{$carbon::now()->toFormattedDateString()}}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2" style="padding:20px 0 0">
                                    <table style="width:100%; border:0;" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th style="width:36px;">&nbsp;</th>
                                            <th align="left" colspan="2" style="color:#29378f; border-bottom: 1px solid #29378f; font-size:22px; font-weight:bold; white-space: nowrap">
                                                {!!$data['subject']!!}
                                            </th>
                                            <th style="width:36px;">&nbsp;</th>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 45px 35px;">
                                    <table style="display: block;width: 100%;">
                                        <tbody style="display: block;width: 100%;">
                                            <tr style="display: block;width: 100%;">
                                                <td style="
                                            display: block;
                                            width: 100%;
                                            font-size: 13px;
                                            font-weight: normal;
                                            padding-bottom: 11px;
                                            word-spacing: 1px;
                                        ">
                                                    @if($data['type'] == "user")
														Dear {{request()->title.' '.request()->name}}, <br><br>
														@if($data['course']->id == 18 && false)
															Thank you for registering for TAFLAT's Virtual Emotional Intelligence Series, and for your payment of ${{$data['course']->price}} for the series.<br><br>
														
															Please block your calendar for this 3-part series, taking place on  
															@php $duration = $data['course']->durations; @endphp
															@if ($duration->count() > 0)
																@foreach ($duration as $row)
																	@if($loop->last && $duration->count() > 1)and @endif{{$carbon::parse($row->start_date)->format('M d, Y')}}@if(!$loop->last), @endif
																@endforeach
															@else
																(Dates to be announced soon!)
															@endif
															. We will send the Zoom invitations to you shortly.<br><br>
															
															If you have any questions about the training, please contact Jim Glantz, TAFLAT's Managing Partner, at jim@taflat.com or Kevin Walsh, TAFLAT's Senior Facilitator, at kevin@taflat.com<br><br>
															
															We very much look forward to meeting you at our first call! <br>
															Yours,<br>
															The TAFLAT Team <br><br>
															
														@elseif($data['course']->id == 16 || $data['course']->id == 18)
															
															Thank you for registering for TAFLAT's (Zoom) {!!ucwords(strtolower(str_replace(': <small>(online)</small>', '', $data['course']->title)))!!}, and for your payment of ${{$data['course']->price}}.
														
															<br><br>
															@php
																$duration = $data['course']->durations;
																
																
																$duration_text = '';
																if ($duration->count() > 0) {
																	$start_date = $carbon::parse($duration[0]->start_date);
																	$end_date = $carbon::parse($duration[0]->end_date);
																	$diff = $start_date->diffInDays($end_date) + 1;
																	$duration_text = 'Please block your calendar for this '.$diff.'-day workshop, 9am-2:30pm (PST) each day, taking place on '.$start_date->format('M d, Y').' - '.$end_date->format('M d, Y').'. ';
																}
															@endphp
															{{$duration_text}}We will send the Zoom invitations to you shortly.
															<br><br>
															If you have any questions about the training, please contact Jim Glantz, TAFLAT's Managing Partner, at jim@taflat.com or Kevin Walsh, TAFLAT's Senior Facilitator, at kevin@taflat.com. 
															
														@else
															Thank you for your payment of ${{$data['course']->price}}, and your registration for the {!!ucwords(strtolower(preg_replace('/\s+\([^\)]+\)/', '', $data['course']->title)))!!}!
															@if($data['course']->location)
																We look forward to seeing you on
																@php $duration = $data['course']->durations; @endphp
																@if ($duration->count() > 0)
																	@foreach ($duration as $row)
																	{{$carbon::parse($row->start_date)->format('M d, Y')}}, at 9:00am.
																	@php break; @endphp
																	@endforeach
																@else
																	(Dates to be announced soon!)
																@endif


																@if($data['course']->id == 17)
																	The workshop will be held at {!!strip_tags($data['course']->location)!!}.
																@else
																	The workshop will be held at the {!!strip_tags($data['course']->location)!!}.
																@endif
															@endif
														
														
															{{-- <br><br>
															Please note that each day begins at 9am (sharp) and goes until 2:30pm (PST). There will be a break, for participants to grab lunch and catch up on work. 
															
															
															<br><br>
															If you have any questions about the workshop location, local hotels, or other logistics, please contact us at: jim@taflat.com <br> --}}
															
															<br><br>
															If you have any questions about the training, please contact Jim Glantz, TAFLAT's Managing Partner, at jim@taflat.com or Kevin Walsh, TAFLAT's Senior Facilitator, at kevin@taflat.com. 

															{{-- @php $duration = $data['course']->durations; @endphp
															@if ($duration->count() > 0)
															@foreach ($duration as $row)
															We can't wait to see you on the {{$carbon::parse($row->start_date)->format('M d, Y')}}!
															@php break; @endphp
															@endforeach
															@endif --}}

															{{-- @if($data['course']->day) 
																	The duration is {{$data['course']->day}}.
															@endif --}}
														@endif
														
													@else
														Following is the registration received for the {!! preg_replace('/\s+\([^\)]+\)/', '', $data['course']->title) !!}! <br>
														This registration is also saved in the back-end. "{{request()->title.' '.request()->name}}" will mail the bank check.
                                                    @endif
														<p>&nbsp;</p>
														<p> Name: {{request()->title.' '.request()->name}}</p>
														<p> Email: {{request()->email}}</p>
														<p> Address: {{request()->address}}</p>
														<p> Mobile: {{request()->mobile}}</p>
														<p> Phone: {{request()->phone}}</p>
														<p> Organization: {{request()->organization}}</p>
														<p> Message: {{request()->comment}} </p>

													@if($data['type'] == "user")
														<br>
														We very much look forward to meeting you!<br>
														Yours,<br>
														The TAFLAT Team
													@endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" style="
                            padding: 12px 35px;
                            text-align: center;
                            background-color: #45b2e3;
                            color: #fff;
                            font-size: 17px;
                            font-weight: normal;
                        ">
                                    {!!str_replace("{year}",$carbon::now()->year,trans('language.email_copyright_text'))!!}
                                    <a style="color:#fff;" href="http://taflat.com">www.taflat.com</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>