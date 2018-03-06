			<div id="popup_level3_clear" class="c-popup">
				<div class="c-popup__aligner">
					<a href="#" class="c-popup__close2">popup close</a>
					<div class="c-popup__box">
						<div class="c-section">
							<div class="c-popup__heading">LEVEL <em class="c-em">3</em> CLEAR</div>
						</div>
						<div class="c-section c-section--middle">
							<div class="c-popup__end">
								축하합니다! <br /><em class="c-em">추첨을 통해 제품을 선물로 보내드리겠습니다</em>
							</div>
						</div>
						<div class="c-section c-section--middle">
							<div class="c-popup__image"><img src="../images/common/c-popup__image-1.png" alt="" /></div>
						</div>
						<div class="c-section c-section--small">
							<div class="c-popup__txt">
								메이크업은 말끔하게 지우고<br /><em class="c-em">건강한 피부만 남겨요!</em>
							</div>
						</div>
						<div class="c-section c-section--middle">
							<div class="c-popup__forms">
								<div class="c-popup__form">
									<div class="c-popup__key">
										<label for="c-popup__input-1" class="c-popup__label">이름</label>
									</div>
									<div class="c-popup__value">
										<input type="text" id="level3_name" class="c-popup__input" />
									</div>
								</div>
								<div class="c-popup__form">
									<div class="c-popup__key">
										<label for="c-popup__input-2" class="c-popup__label">전화번호</label>
									</div>
									<div class="c-popup__value">
										<input type="tel" id="level3_phone" class="c-popup__input" onkeyup="only_num(this);chk_strlen(this);" />
									</div>
								</div>
								<div class="c-popup__form c-popup__form--button">
									<div class="c-popup__key">
										<label for="c-popup__input-3" class="c-popup__label">주소</label>
									</div>
									<div class="c-popup__value">
										<input type="text" id="level3_addr" class="c-popup__input" readonly="true" />
										<a href="#" class="c-search__button" onclick="findAddr(3)">찾기버튼</a>
									</div>
								</div>
								<div class="c-popup__form c-popup__form--button">
									<div class="c-popup__value">
										<input type="text" id="level3_addr2" class="c-popup__input" />
									</div>
								</div>
							</div>
						</div>
						<div class="c-section c-section--small">
							<div class="c-popup__noti">
								- 입력하신 정보로 경품이 발송되니 정확하게 입력해주세요 
								<br />- 부정확한 정보 입력으로 경품 미발송은 책임지지 않습니다
								<br />- 부적절한 방법(타인명의사용 등)으로 이벤트 참여 시
								<br />당첨이 취소됨을 알려드립니다
							</div>
						</div>
						<div class="c-section c-section--small">
							<div class="c-agrees">
								<div class="c-agree">
									<div class="c-agree__key" onclick="popupOpen('popup_agree1');"> *  개인 정보 수집 및 이용 약관 보기</div>
									<div class="c-agree__value">
										<div class="c-agree__checks">
											<input type="checkbox" name="level3_agree1" id="level3_agree1" class="c-agree__check" />
											<label for="level3_agree1" class="c-agree__label">개인 정보 수집 및 이용에 동의합니다</label>
										</div>
									</div>
								</div>
								<div class="c-agree">
									<div class="c-agree__key" onclick="popupOpen('popup_agree2');"> *  개인 정보 취급 위탁 약관 보기</div>
									<div class="c-agree__value">
										<div class="c-agree__checks">
											<input type="checkbox" name="level3_agree2" id="level3_agree2" class="c-agree__check" />
											<label for="level3_agree2" class="c-agree__label">개인 정보 취급 위탁에 동의합니다</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="c-section">
							<div class="c-popup__buttons" onclick="levelSubmit(3);">
								<button class="c-popup__button">확인</button>
							</div>
						</div>
					</div>
				</div>
			</div>
