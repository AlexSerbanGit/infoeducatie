<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
		<title>Raspuns</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style type="text/css">
			a{
				outline:none;
				color:#fa5151;
				text-decoration:underline;
			}
			a:hover{text-decoration:none !important;}
			.h-u a{text-decoration:none;}
			.h-u a:hover{text-decoration:underline !important;}
			a[x-apple-data-detectors]{color:inherit !important; text-decoration:none !important;}
			a[href^="tel"]:hover{text-decoration:none !important;}
			p{Margin:0 !important;}
			.active-i a:hover,
			.active-t:hover{opacity:0.8;}
			.active-i a,
			.active-t{transition:all 0.3s ease;}
			a img{border:none;}
			th{padding:0;}
			table td{mso-line-height-rule:exactly;}
			[owa] div button{display:block; font-size:1px; line-height:1px;}
			[owa] .body div{display:block !important; font-size:1px; line-height:1px;}
			.l-white a{color:#fff;}
			.btn-01 a{padding:14px 30px; color:#F69B24; text-decoration:none; display:block;}
			.btn-02 a{padding:12px 30px; color:#F69B24; text-decoration:none; display:block;}
			.btn-03 a{padding:14px 30px; color:#F69B24; text-decoration:none; display:block;}
			.btn-bg-01:hover{background-color:#e8e7e6 !important;}
			.btn-bg-02:hover{background-color:#f7f7f7 !important;}
			.btn-bg-01, .btn-bg-02{transition:all 0.3s ease;}
			@media only screen and (max-width:375px) and (min-width:374px) {.gmail-fix{min-width:374px !important;}}
			@media only screen and (max-width:414px) and (min-width:413px) {.gmail-fix{min-width:413px !important;}}
			@media only screen and (max-width:500px) {
				/* default style */
				.flexible{width:100% !important;}
				.img-flex img{width:100% !important; height:auto !important;}
				.table-holder{display:table !important; width:100% !important;}
				.thead{display:table-header-group !important; width:100% !important;}
				.tfoot{display:table-footer-group !important; width:100% !important;}
				.flex{display:block !important; width:100% !important;}
				.hide{display:none !important; width:0 !important; height:0 !important; padding:0 !important; font-size:0 !important; line-height:0 !important;}
				.p-0{padding:0 !important;}
				.p-20{padding:20px !important;}
				.p-25{padding:25px !important;}
				.p-30{padding:30px !important;}
				.plr-15{padding-left:15px !important; padding-right:15px !important;}
				.plr-20{padding-left:20px !important; padding-right:20px !important;}
				.pt-20{padding-top:20px !important;}
				.pt-25{padding-top:25px !important;}
				.pb-15{padding-bottom:15px !important;}
				.pb-20{padding-bottom:20px !important;}
				.pb-25{padding-bottom:25px !important;}
				.fs-24{font-size:24px !important;}
				.lh-28{line-height:28px !important;}
				/* custom style */
				.pt-10p{padding-top:10%;}
				.plr-9p{padding-left:9%; padding-right:9%;}
				.pb-8p{padding-bottom:8%;}
				.social-icons img{width:85% !important;}
			}
		</style>
	</head>
	<body class="body" bgcolor="#ffffff" style="margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;">
		<table class="gmail-fix" bgcolor="#ffffff" width="100%" style="min-width:320px;" cellspacing="0" cellpadding="0">
			<tr>
				<td style="display:none; font-size:0; line-height:0;">
					<!-- Preheader -->
				</td>
			</tr>
			<tr>
				<td>
					<table class="flexible" width="600" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
						<tr>
							<td class="img-flex" align="center">
								<a style="text-decoration:none;" href="{{ url('/') }}">
									<img editable="true" src="{{ $message->embed(public_path().'/images/beescanner.png') }}" width="600" style="font:40px/44px Arial, Helvetica, sans-serif; color:#000; vertical-align:top;" alt="Avtei o invitatie la nunta!" />
								</a>
							</td>
						</tr>
						<!-- content -->
						<tr>
							<td>
								<repeater>
									<!-- section -->
									<layout label="centered_text_with_color_bg">
										<table width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td class="l-white p-25" bgcolor="#F69B24" style="padding:53px 150px 60px;">
													<table width="100%" cellpadding="0" cellspacing="0">
														<tr>
															<td align="center" style="padding:0 0 9px; font:700 26px/35px Arial, Helvetica, sans-serif; color:#fff;">
																<multiline>
																	Factura
																</multiline>
															</td>
														</tr>
														<tr>
															<td align="center" style="padding:0 0 20px; font:15px/30px Arial, Helvetica, sans-serif; color:#fff;">
																<multiline>
                                                                    {{$user->name}}, echipa BeeScanner iti multumeste pentru ca ai commandat de pe BeeScanner.ro.
                                                                    Mai jos vei avea atasasta o factura in format PDF. Speram sa fii satisafacut de seriviciile noastre si sa le recomanzi si prietenilor.
																</multiline>
															</td>
														</tr>
                                                        <tr>
															<td align="right" style="padding:0 0 20px; font:15px/30px Arial, Helvetica, sans-serif; color:#fff;">
																<multiline>
                                                                    Cu drag 
                                                                    <br>
                                                                    -Echipa Beescanner
																</multiline>
															</td>
														</tr>
														<tr>
															<td>
																<table align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
																	<tr>
																		<td class="btn-01 active-t" bgcolor="#ffffff" align="center" style="mso-padding-alt:14px 30px; font:700 14px/16px Arial, Helvetica, sans-serif; text-transform:uppercase; border-radius:22px;">
																			<multiline>
																				<a href="{{ url('/') }}">
																					Bee Scanner
																				</a>
																			</multiline>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</layout>
									
	</body>
</html>