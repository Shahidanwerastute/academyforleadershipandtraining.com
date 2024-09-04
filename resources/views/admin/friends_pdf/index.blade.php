@extends('admin.layouts.template')
@section('content')
	<!-- main sidebar end -->
	<div id="page_content">
		<div id="page_content_inner">
			<h3 class="heading_b uk-margin-bottom">Manage Pdf's</h3>
			<div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <div class="uk-overflow-container">
                        <table class="uk-table uk-table-nowrap table_check">
                            <thead>
                            <tr>
                                <th class="uk-width-1-10 uk-text-center">Primary Behavior</th>
                                <th class="uk-width-1-10">Secondary Behavior</th>
                                <th class="uk-width-1-10 uk-text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
								@foreach($data['content']  as $row)
                                <tr>
									<td class="uk-text-center">{{$row->p_behavior}}</td>
									<td>{{$row->behavior}}</td>
									<td class="uk-text-center">
										<a href="{{route('admin-new-pdf-update', [$row->id])}}"><i class="md-icon material-icons">&#xE254;</i></a>
									</td>
								</tr>
								@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
@endsection
@push('css')

@endpush
@push('js')	

	
@endpush
@push('metainfo');
	<title>Manage Pdf's | {{ config('app.name') }}</title>
@endpush