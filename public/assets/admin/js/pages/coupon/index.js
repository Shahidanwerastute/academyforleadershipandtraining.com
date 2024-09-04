$(function() {
	// crud table
	if ($("#records").length) records.init();
});
records = {
	init: function() {
		$("#records")
			.jtable({
				title: "Manage Coupons",
				paging: true,
				messages: {
					addNewRecord: "Add new coupon",
					editRecord: "Edit coupon",
					areYouSure: "Are you sure?"
				},
				pageSize: 10,
				sorting: true,
				addRecordButton: $("#recordAdd"),
				deleteConfirmation: function(data) {
					data.deleteConfirmMessage =
						"Are you sure to delete coupon " +
						data.record.code +
						"?";
				},
				formCreated: function(event, data) {
					reInitDesign(event, data);
				},
				recordDeleted: function(event, data) {
					$(".success-alert")
						.attr(
							"data-message",
							success_alert("Deleted successfully.")
						)
						.trigger("click");
				},
				actions: {
					listAction: coupons,
					createAction: coupon_create,
					updateAction: coupon_update,
					deleteAction: coupon_delete
				},
				fields: {
					id: {
						key: true,
						create: false,
						edit: false,
						list: false
					},
					course: {
						title: "Courses",
						sorting: false,
						create: false,
						edit: false,
						width: "1.5%",
						display: function(couponInfo) {
							if (couponInfo.record.type == 1) {
								var $link = $(
									'<i class="material-icons">low_priority</i>'
								);
								$link.click(function() {
									$("#records").jtable(
										"openChildTable",
										$link.closest("tr"),
										{
											title: " - Courses",
											paging: true, //Enable paging
											pageSize: 10, //Set page size (default: 10)
											sorting: true,
											deleteConfirmation: function(data) {
												data.deleteConfirmMessage =
													"Are you sure to delete " +
													data.record.title +
													"?";
											},
											formCreated: function(event, data) {
												data.form
													.find("[name=title]")
													.autocomplete({
														source: function(
															request,
															response
														) {
															$.ajax({
																type: "POST",
																url: autocomplete_courses,
																dataType:
																	"json",
																data: {
																	title: data.form
																		.find(
																			"[name=title]"
																		)
																		.val()
																},
																success: function(
																	data
																) {
																	response(
																		$.map(
																			data,
																			function(
																				item
																			) {
																				return {
																					id:
																						item.id,
																					label:
																						item.title,
																					value:
																						item.title
																				};
																			}
																		)
																	);
																}
															});
														},
														select: function(
															event,
															ui
														) {
															data.form
																.find(
																	"[name=course_id]"
																)
																.val(
																	ui.item.id
																);
														},
														minLength: 1,
														delay: 500
													});
												data.form
													.find("input[name=title]")
													.attr(
														"data-uk-tooltip",
														"{cls:'long-text'}"
													)
													.attr(
														"title",
														"Choose specific courses the coupon will apply to. Select no courses to apply coupon to entire cart."
													);
												reInitDesign(event, data);
											},
											actions: {
												listAction:
													coupons +
													"?action=coupon_courses",
												createAction:
													coupon_create +
													"?action=coupon_course_create",
												updateAction:
													coupon_update +
													"?action=coupon_course_update",
												deleteAction:
													coupon_delete +
													"?action=coupon_course_delete&coupon_id=" +
													couponInfo.record.id
											},
											fields: {
												id: {
													key: true,
													create: false,
													edit: false,
													list: false
												},
												title: {
													title: "Course",
													create: true,
													edit: true,
													list: true,
													type: "text",
													inputTitle: "Search Course"
												},
												coupon_id: {
													type: "hidden",
													create: true,
													edit: true,
													list: false,
													defaultValue:
														couponInfo.record.id
												},
												course_id: {
													type: "hidden",
													create: true,
													edit: true,
													list: false
												}
											}
										},
										function(data) {
											//opened handler
											data.childTable.jtable("load", {
												coupon_id: couponInfo.record.id
											});
										}
									);
								});
								return $link;
							}
						}
					},
					code: {
						title: "Coupon",
						sorting: false,
						create: true,
						edit: true,
						list: true,
						type: "text"
					},
					percentage: {
						title: "Percentage",
						sorting: false,
						create: true,
						edit: true,
						list: true,
						type: "text"
					},
					start_date: {
						title: "Start Date",
						sorting: false,
						create: true,
						edit: true,
						list: true,
						displayFormat: "DD, MM d, yy",
						type: "date"
					},
					end_date: {
						title: "End Date",
						sorting: false,
						create: true,
						edit: true,
						list: true,
						displayFormat: "DD, MM d, yy",
						type: "date"
					},
					type: {
						title: "Type",
						options: {
							"0": "Survey",
							"1": "Course"
						}
					}
				}
			})
			.jtable("load");
		$("#search").click(function(e) {
			e.preventDefault();
			$("#records").jtable("load", {
				name: $("[name=name]").val()
			});
		});
	}
};
