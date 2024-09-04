<div class="uk-grid uk-grid-divider" data-uk-grid-margin>
	<div class="uk-width-large-1-1 uk-width-medium-1-1">
		<ul class="md-list">
			@foreach(questions($data['submission']->survey_id) as $question)
				@foreach($data['submission']->answers($question->id) as $answer)
					<li>
						<div class="md-list-content">
							<span class="md-list-heading"><?php echo $question->label; ?></span>
							<span class="uk-text-small uk-text-muted">
								<div class="uk-grid" data-uk-grid-margin="">
									<div class="uk-width-medium-1-2">
										<span style="float:left;margin-left:2px;margin-top:5px;" class="uk-badge uk-badge-notification uk-badge-primary">{{$answer->answer}}</span>
									</div>
								</div>
							</span>
						</div>
					</li>
				@endforeach
			@endforeach
		</ul>
		<hr class="uk-grid-divider">
	</div>
</div>