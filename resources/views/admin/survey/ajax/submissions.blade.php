@php $colors = array('analytical' => '#64b5e0', 'driver' => '#9de258', 'amiable' => '#ffc172', 'expressive' => '#ffe160')  @endphp
<div class="md-card uk-margin-medium-bottom">
	@if(isset($data['route-paramters']['parent_assessment_id']))
		<div class="md-card-content">
			<div class="uk-accordion" data-uk-accordion>
				<h3 class="uk-accordion-title uk-accordion-title-primary">Friends</h3>
				<div class="uk-accordion-content">
					<div class="uk-overflow-container">
						<table class="uk-table uk-table-condensed">
							<thead>
								<tr>
									<th></th>
									<th>Name</th>
									<th>Email</th>
								</tr>
							</thead>
							<tbody>
							@foreach(friends($data['group_info'], $data['route-paramters']['parent_assessment_id']) as $row)
								<tr data-group="{{$data['group_info']}}" data-parent="{{$data['route-paramters']['parent_assessment_id']}}">
									<td>
										@if($row->is_submit == 1)
											<span class="material-icons">check_circle</span>
                                    	@else 
                                    		<span class="material-icons">cancel</span>
										@endif
									</td>
									<td>{{$row->name}}</td>
									<td>{{$row->email}}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	@endif
	<div class="md-card-content">
		<div class="uk-overflow-container">
			@if($data['submissions']->count() > 0)
				@if($data['questions']->count() > 0)
					<table class="uk-table uk-table-nowrap table_check">
						<thead>
							<tr>
								<th class="uk-width-1-10 uk-text-center">Results</th>
								@if(!isset($data['route-paramters']['parent_assessment_id']))
									<th class="uk-width-1-10 uk-text-center">Friends</th>
								@endif
								<th class="uk-width-1-10 uk-text-center"><b>Date</b></th>
								<th class="uk-width-1-10 uk-text-center"><b>Name</b></th>
								<th class="uk-width-1-10 uk-text-center"><b>Email</b></th>
								<th class="uk-width-1-10 uk-text-center"><b>Mobile</b></th>
								<th class="uk-width-1-10 uk-text-center"><b>Fall In</b></th>
								@if(!isset($data['route-paramters']['parent_assessment_id']))
									<th class="uk-width-1-10 uk-text-center">Aggregate</th>
								@endif
								<th class="uk-width-1-10 uk-text-center"><b>- b + a</b></th>
								<th class="uk-width-1-10 uk-text-center"><b>- l + r</b></th>
								<th class="uk-width-1-10 uk-text-center"><b>Personality</b></th>
								<th class="uk-width-1-10 uk-text-center"><b>Amount</b></th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['submissions'] as $submission)
								<tr>
									<td class="uk-text-center"><a data-id="{{ $submission->id }}" class="fetch-result" href="javascript:void(0)"><i class="material-icons">list</i></a></td>
									@if(!isset($data['route-paramters']['parent_assessment_id']))
										<td class="uk-text-center">
											@if($submission->total_friends > 0)
												<a href="{{route('admin-submissions', [$submission->id])}}">
													<i class="material-icons">list</i>
												</a>
												{{$submission->total_friend_submissions.'/'.$submission->total_friends}}
											@endif
										</td>	
									@endif
									<td class="uk-text-center">{{$carbon::parse($submission->created_at)->toFormattedDateString()}}</td>
									<td class="uk-text-center">{{$submission->first_name.' '.$submission->last_name}}</td>
									<td class="uk-text-center">{{$submission->email}}</td>
									<td class="uk-text-center">{{$submission->mobile}}</td>
									<td class="uk-text-center">
										Primary <a data-uk-modal="{target:'#modal_primary-{{$submission->id}}'}"><i class="material-icons">remove_red_eye</i></a>
										<div class="uk-modal" id="modal_primary-{{$submission->id}}">
											<div class="uk-modal-dialog uk-modal-dialog-lightbox">
												<button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
												{{HTML::image('public/assets/admin/images/survey/'.$submission->image)}}
											</div>
										</div>
										Secondary <a data-uk-modal="{target:'#modal_secondary-{{$submission->id}}'}"><i class="material-icons">remove_red_eye</i></a>
										<div class="uk-modal" id="modal_secondary-{{$submission->id}}">
											<div class="uk-modal-dialog uk-modal-dialog-lightbox">
												<button type="button" class="uk-modal-close uk-close uk-close-alt"></button>
												{{HTML::image('public/assets/admin/images/survey/'.$submission->behavior.'_'.$submission->sub_behavior.'.png')}}
											</div>
										</div>
									</td>
									@if(!isset($data['route-paramters']['parent_assessment_id']))
										<td class="uk-text-center">
											@if($submission->total_friend_submissions > 0)
												Primary <a class="aggregate" data-id="{{ $submission->id }}" data-type="primary"><i class="material-icons">remove_red_eye</i></a>
												Secondary <a class="aggregate" data-id="{{ $submission->id }}" data-type="secondary"><i class="material-icons">remove_red_eye</i></a>
											@elseif($submission->total_friends > 0 && $submission->total_friend_submissions == 0)
												No submission found
											@endif
										</td>
									@endif
									<td class="uk-text-center">{{('- '.$submission->b.' + '.$submission->a.' = '. (-$submission->b + $submission->a))}}</td>
									<td class="uk-text-center">{{('- '.$submission->l.' + '.$submission->r.' = '. (-$submission->l + $submission->r))}}</td>
									


									<?php 

if(isset($colors[$submission->behavior])){
	$colored=$colors[$submission->behavior];
	$title_c=$submission->behavior;
}else{
	$colored='';
	$title_c='';
}


?>

		<td class="uk-text-center" style="background-color:grey;color:{{$colored}}">{{'Pri: '.title_case($title_c).' | Sec: '.strtoupper($submission->sub_behavior)}}</td>
									<td class="uk-text-center">{{$submission->amount}}</td>
								</tr>
							@endforeach 
						</tbody>
					</table>
				@else
					<div class="uk-alert uk-alert-large" data-uk-alert="">
						<a href="#" class="uk-alert-close uk-close"></a>
						<h4 class="heading_b">No question found!</h4>
					</div>
				@endif
			@else
				<div class="uk-alert uk-alert-large" data-uk-alert="">
					<a href="#" class="uk-alert-close uk-close"></a>
					<h4 class="heading_b">No submissions found!</h4>
				</div>
			@endif
		</div>
		{{ $data['submissions']->links('pagination.custom') }}
	</div>
</div>