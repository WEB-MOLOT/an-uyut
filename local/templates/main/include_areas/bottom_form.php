<div class="want_use_services">
						<div class="wus_inside">
							<div class="wus_title"><span>Хотите воспользоваться</span> нашими услугами?</div>
							<div class="wus_desc">Оставьте заявку в этой форме или позвоните нам по номеру <span>8 495 150 33 28</span> и мы решим ваш жилищный вопрос!</div>
							<div class="wus_form">

                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:form",
                                    "",
                                    Array(
                                        "WEB_FORM_ID" => "2",
                                        "START_PAGE" => "new",
                                        "SHOW_LIST_PAGE" => "N",
                                        "SHOW_EDIT_PAGE" => "N",
                                        "SHOW_VIEW_PAGE" => "N",
                                        "SUCCESS_URL" => "/thanks/",
                                        "SHOW_ANSWER_VALUE" => "Y",
										"AJAX_MODE" => "Y"
                                    ),

);?>


							</div>
						<!--<div class="wus_form">
								<form>
									<div class="row wus_fields d_flex a_items_center f_wrap">
										<div class="col col-3">
											<div class="wus_field">
												<input type="text" placeholder="Имя:"/>
											</div>
										</div>
										<div class="col col-3">
											<div class="wus_field">
												<input type="text" placeholder="Телефон:"/>
											</div>
										</div>
										<div class="col col-3">
											<div class="wus_field">
												<input type="text" placeholder="E-mail:"/>
											</div>
										</div>
										<div class="col col-1">
											<div class="wus_field">
												<textarea placeholder="Краткое описание вопроса:"></textarea>
											</div>
										</div>
									</div>
									<div class="wus_form_submit">
										<div class="wus_fs_btn">
											<button type="submit" class="btn btn_yellow btn--arrow btn--large d_flex a_items_center j_content_center">
												<em class="btn_txt">Оставить заявку</em>
												<em class="btn_icon"><svg width="14" height="7" viewBox="0 0 14 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 3.5L9.73438 0.0312499L9.01563 0.71875L11.2109 3.00781L-1.3011e-07 3.00781L-1.73821e-07 4.00781L11.1914 4.00781L9.01563 6.28125L9.73438 6.96875L13.0703 3.5Z" fill="#39331E"/></svg></em>
											</button>
										</div>
										<div class="wus_fs_agree">
											<span class="agree_input_field">
												<span class="agree_input">
													<input type="checkbox" value=""/>
												</span>
												<span class="agree_txt">Даю согласие на обработку <a href="#">персональных данных</a></span>
											</span>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>-->