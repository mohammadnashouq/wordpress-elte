import React from 'react'
import { __ } from "@wordpress/i18n";
import rtEvents from 'rt-events'

function Header() {
	return (
		<div className="main--wrapper">
			<header >
				<div className="container">
					<div onClick={(e) => e.shiftKey &&
						rtEvents.trigger('ct:dashboard:heading:advanced-click')} className="header--wrapper">
						{RishiDashboard.has_heading.has_theme_name ||
							(<div className="logo">
								<a href="#">
								<svg width="193" height="53" viewBox="0 0 872 192" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M116.59 93.3291L128.112 88.285L154.281 108.945C166.733 101.854 175.127 88.4711 175.127 73.1528V73.1342C175.127 50.4453 156.719 32 133.993 32H80.9281H64.9398H44.3727C41.1527 32 38.5655 34.6058 38.5655 37.8072C38.5655 41.0272 41.1713 43.6144 44.3727 43.6144H56.5268C59.7468 43.6144 62.334 46.2202 62.334 49.4216C62.334 52.6416 59.7282 55.2287 56.5268 55.2287H29.7803C26.5602 55.2287 23.9731 57.8345 23.9731 61.0359C23.9731 64.2559 26.5789 66.8431 29.7803 66.8431H59.1326C62.3526 66.8431 64.9398 69.4489 64.9398 72.6503C64.9398 75.8703 62.334 78.4575 59.1326 78.4575H44.3727C41.1527 78.4575 38.5655 81.0633 38.5655 84.2647C38.5655 87.4847 41.1713 90.0718 44.3727 90.0718H46.8854C50.1054 90.0718 52.6926 92.6776 52.6926 95.879V95.8976C52.6926 99.1176 50.0868 101.705 46.8854 101.705H13.9594C10.7394 101.705 8.15222 104.311 8.15222 107.512C8.15222 110.732 10.758 113.319 13.9594 113.319H55.2798C58.4998 113.319 61.0869 115.925 61.0869 119.126C61.0869 122.328 58.4811 124.934 55.2798 124.934H44.3727C41.1527 124.934 38.5655 127.539 38.5655 130.741C38.5655 133.961 41.1713 136.548 44.3727 136.548H47.3693C50.5893 136.548 53.1765 139.154 53.1765 142.355V142.374C53.1765 145.594 50.5707 148.181 47.3693 148.181H33.8378C30.6178 148.181 28.0307 150.787 28.0307 153.988C28.0307 157.208 30.6364 159.795 33.8378 159.795H64.9584H80.9281H174.681L116.758 114.287L106.465 106.172L100.043 114.287L90.9604 125.808L80.9095 117.861L76.3866 114.287L69.4255 108.815L80.9095 94.2783L93.6965 78.048L116.144 49.5518L137.716 66.5639L123.44 84.6369L116.59 93.3291Z" fill="white"/>
									<path d="M6.92413 43.5211H18.2407C21.4235 43.5211 24.0107 40.9339 24.0107 37.7512C24.0107 34.5684 21.4235 31.9812 18.2407 31.9812H6.92413C3.74135 31.9812 1.15417 34.5684 1.15417 37.7512C1.15417 40.9526 3.74135 43.5211 6.92413 43.5211Z" fill="white"/>
									<path d="M6.92413 90.0716H18.2407C21.4235 90.0716 24.0107 87.4845 24.0107 84.3017C24.0107 81.1189 21.4235 78.5317 18.2407 78.5317H6.92413C3.74135 78.5317 1.15417 81.1189 1.15417 84.3017C1.15417 87.4845 3.74135 90.0716 6.92413 90.0716Z" fill="white"/>
									<path d="M17.0679 125.082H5.76996C2.58717 125.082 0 127.669 0 130.852V130.945C0 134.128 2.58717 136.715 5.76996 136.715H17.0865C20.2693 136.715 22.8565 134.128 22.8565 130.945V130.852C22.8379 127.669 20.2507 125.082 17.0679 125.082Z" fill="white"/>
									<path d="M260.26 104.72C273.401 101.463 278.333 91.5796 278.333 82.4035C278.333 69.7096 269.25 59.0444 250.731 59.0444H223.798V137.032H236.585V105.818H246.357L264.299 137.032H279.562L260.26 104.72ZM236.585 95.6185V69.4862H250.731C260.707 69.4862 265.193 74.5303 265.193 82.4035C265.193 90.1278 260.707 95.6371 250.731 95.6371H236.585V95.6185Z" fill="white"/>
									<path d="M294.713 78.5319V137.013H307.5V78.5319H294.713ZM301.208 53.9817C296.611 53.9817 293.019 57.5553 293.019 62.1527C293.019 66.7687 296.63 70.3423 301.208 70.3423C305.694 70.3423 309.286 66.7687 309.286 62.1527C309.268 57.5553 305.694 53.9817 301.208 53.9817Z" fill="white"/>
									<path d="M334.861 91.9145C334.861 87.7638 338.434 84.9533 345.302 84.9533C352.245 84.9533 356.396 88.6573 356.861 94.0363H369.648C368.959 81.6961 359.765 74.1765 345.749 74.1765C331.157 74.1765 321.943 82.1242 321.943 92.0075C321.943 114.678 357.866 107.717 357.866 119.834C357.866 124.096 353.92 127.242 346.531 127.242C339.439 127.242 334.637 123.091 334.191 118.065H320.957C321.497 129.27 331.938 138.018 346.754 138.018C361.328 138.018 370.43 130.164 370.43 119.741C369.741 97.4052 334.861 104.366 334.861 91.9145Z" fill="white"/>
									<path d="M416.18 74.1951C408.213 74.1951 401.271 77.229 396.99 82.3847V54.0002H384.203V137.032H396.99V102.468C396.99 91.1327 403.169 85.3069 412.569 85.3069C421.894 85.3069 428.073 91.1327 428.073 102.468V137.032H440.73V100.569C440.749 83.2781 429.972 74.1951 416.18 74.1951Z" fill="white"/>
									<path d="M456.998 78.5319V137.013H469.784V78.5319H456.998ZM463.512 53.9817C458.896 53.9817 455.322 57.5553 455.322 62.1527C455.322 66.7687 458.896 70.3423 463.512 70.3423C467.998 70.3423 471.59 66.7687 471.59 62.1527C471.59 57.5553 467.998 53.9817 463.512 53.9817Z" fill="white"/>
									<path d="M494.986 58.5977V65.1121H516.856V137.032H524.711V65.1121H546.488V58.5977H494.986Z" fill="white"/>
									<path d="M588.086 74.6418C578.78 74.6418 570.702 78.6994 566.775 86.2003V54.0002H558.92V137.032H566.775V103.585C566.775 88.6758 574.741 81.4913 586.188 81.4913C597.393 81.4913 604.8 88.4525 604.8 102.04V137.05H612.562V101.128C612.562 83.1665 601.674 74.6418 588.086 74.6418Z" fill="white"/>
									<path d="M685.338 103.25C685.338 87.6522 674.357 74.8652 656.395 74.8652C638.788 74.8652 626.317 86.8705 626.317 106.395C626.317 125.808 639.011 137.925 656.395 137.925C671.751 137.925 681.634 129.159 684.445 117.6H676.144C673.891 125.79 666.837 131.299 656.395 131.299C644.949 131.299 634.972 123.761 634.302 109.429H685.115C685.338 107.27 685.338 105.725 685.338 103.25ZM634.321 103.026C635.214 88.7876 644.967 81.6031 656.079 81.6031C667.414 81.6031 677.726 88.7876 677.409 103.026H634.321Z" fill="white"/>
									<path d="M772.633 74.6418C762.88 74.6418 753.89 79.6859 750.54 89.681C746.836 79.4626 738.069 74.6418 727.869 74.6418C719.233 74.6418 711.471 78.5691 707.544 86.3121V75.74H699.689V137.013H707.544V103.789C707.544 88.8806 715.306 81.4727 726.51 81.4727C737.399 81.4727 744.583 88.4339 744.583 102.021V137.032H752.308V103.789C752.308 88.8806 760.181 81.4727 771.274 81.4727C782.163 81.4727 789.217 88.4339 789.217 102.021V137.032H796.978V101.109C796.96 83.1665 786.202 74.6418 772.633 74.6418Z" fill="white"/>
									<path d="M869.754 103.25C869.754 87.6522 858.772 74.8652 840.811 74.8652C823.185 74.8652 810.733 86.8705 810.733 106.395C810.733 125.808 823.389 137.925 840.811 137.925C856.167 137.925 866.05 129.159 868.86 117.6H860.54C858.326 125.79 851.234 131.299 840.811 131.299C829.364 131.299 819.388 123.761 818.718 109.429H869.531C869.754 107.27 869.754 105.725 869.754 103.25ZM818.718 103.026C819.611 88.7876 829.364 81.6031 840.476 81.6031C851.811 81.6031 862.123 88.7876 861.788 103.026H818.718Z" fill="white"/>
									<path d="M174.662 160H149.386L105.255 127.409L91.0537 145.985L69.4257 130.555V108.815L76.3868 114.287L90.9606 125.827L100.044 114.287L106.465 106.172L116.758 114.287L174.662 160Z" fill="white"/>
								</svg>

								</a>
							</div>)}
						<div className="details">
							<p> {RishiDashboard.has_heading.has_theme_description || __('Rishi Theme is core web vitals optimized WordPress theme. It lightning fast, lightweight and highly customizable.', 'rishi')} </p>
						</div>
					</div>
				</div>
			</header>
		</div >

	)
}

export default Header
