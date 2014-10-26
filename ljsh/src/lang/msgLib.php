<?php

	// http://www.weltsprachen.net/ (Muttersprachler/Sprecher weltweit)
	// http://de.statista.com/statistik/daten/studie/157868/umfrage/anzahl-der-weltweiten-internetnutzer-nach-regionen/
	// http://wifimaku.com/online-marketing/einleitung-und-grundlagen/facts-%26-figures/internetnutzung/internetnutzung-weltweit#Internetnutzungweltweit-InternetnutzungnachWeltregionen
	$msg = array( 
		"en" => array( // 01 english (375 Mio./1500 Mio.) | (USA[G8] <02|2012:245,2Mio->2014:->279,82Mio>, UK[G8] <09|2012:52,72Mio->2014:->57,08Mio>, Canada[G8] <20|2012:?Mio->2014:33Mio>, Irland, Australia, NZ, Südafrika, Nigeria <08|2012:48,27Mio->2014:67,1Mio>)
			"label_searchfield" => "Type or Paste the URL of the company in here",
			"label_companyURL" => "Company URL",
			"label_companyName" => "Company Name",
			"label_country" => "Country",
			"label_city" => "City",
			"label_companyAddress" => "Street, Post Code",
			"label_companyMapURL" => "Map URL",
			"label_companyRatings" => "Ratings",
			"label_companyNotes" => "Remarks",
			"label_jobPosition" => "Position Name",
			"label_jobPositionURL" => "Job URL",
			"label_jobNotes" => "Remarks",
			"button_text_waiting" => "Waiting for Input..",
			"button_text_invalid" => "URL is invalid!",
			"button_text_enter_company" => "Enter New Company",
			"button_text_add_company" => "Add New Company",
			"button_text_edit_company" => "Edit Company",
			"button_text_add_job" => "Add New Job",
			"button_text_edit_job" => "Edit Job",
			"button_text_cancel" => "Cancel",
			"warning_msg_exist" => "already exist in",
			"warning_msg_similar_exist" => "similar URL found in",
			"error_msg_fetch_failed" => "We are apologizing! During data loading an error has occurred!",
			"error_msg_submit_failed" => "We are apologizing! During data processing an error has occurred!",
			"error_msg_move_failed" => "We are apologizing! During data processing an error has occurred!",
			"error_msg_delete_failed" => "We are apologizing! During deleting an error has occurred!",
			"l1" => "HOT LIST",
			"l2" => "NOT BAD, BUT ..",
			"l3" => "BLACK LIST",
		),
		"cn" => array( // 02 chinese (982 Mio./1100 Mio.) | (China <01|2012:528Mio->2014:641,6Mio>, Taiwan, Singapur)
			"label_searchfield" => "添加或给予公司网址在这里"
		),
		"hi" => array( // 03 Hindi, (460 Mio./650 Mio.) | Indien <03|2012:137Mio->2014:243,2Mio>
			"label_searchfield" => "जोड़ें या यहाँ में कंपनी यूआरएल दे"
		),
		"es" => array( // 04 espanol (330 Mio./420 Mio.) | (Spain <19|2012:31,61Mio->2014:35,01Mio>, Mexiko <11|2012:42Mio->2014:->50,92Mio>, South America(Kolumbien,Argentinien,Venezuela,Chile) )
			"label_searchfield" => "Añadir o dar la URL empresa aquí"
		),
		"fr" => array( // 05 francais (79 Mio./370 Mio.) | (France[G8] UK[G8] <10|2012:52,28Mio->2014:55,43Mio>, Canada [G8], Belgien, Schweiz, Luxemburg, Africa(Kongo,Madagaskar,Kamerun,Elfenbeinküste,..) )
			"label_searchfield" => "Ajouter ou donner à l'entreprise URL ici"
		),
		"ar" => array( // 06 arabisch (206 Mio./300 Mio.) | (Ägypten <14|2012:29,81Mio->2014:40,31Mio>,Algerien,Irak,Israel,Marokko,Kuwait,Saudi-Arabien,Syrien,Tunesien,Ver. Arab. Emirate,..)
			"label_searchfield" => "إضافة أو إعطاء URL الشركة في هنا"
		),
		"ru" => array( // 07 russian (165 Mio./275 Mio.) | (Russia[G8] <06|2012:67,98Mio->2014:84,44Mio>, Ukraine, Kasachstan, Weißrussland und Kirgisistan))
			"label_searchfield" => "Добавить или дать URL компании здесь"
		),
		"po" => array( // 08 portugues (216 Mio./235 Mio.) | (Portugal, Brasil <05|2012:88,49Mio->2014:107,82Mio>)
			"label_searchfield" => "Adicionar ou dar o URL empresa aqui"
		),
		"be" => array( // 09 bengali (215 Mio./233 Mio.) | (Bangladesch, Indien)
			"label_searchfield" => "যুক্ত করুন অথবা এখানে কোম্পানী URL দিন"
		),
		"de" => array( // 10 german (105 Mio./185 Mio.) |(Germany[G8] <07|2012:67,48Mio->2014:71,72Mio>)
			"label_searchfield" => "Füge oder gebe die Firmen URL hier ein",
			"label_companyURL" => "URL des Unternehmens",
			"label_companyName" => "Name des Unternehmens",
			"label_country" => "Land",
			"label_city" => "Stadt",
			"label_companyAddress" => "Strasse, Postleitzahl",
			"label_companyMapURL" => "Kartenlink",
			"label_companyRatings" => "Bewertungen",
			"label_companyNotes" => "Bemerkungen",
			"label_jobPosition" => "Stellenname",
			"label_jobPositionURL" => "Job URL",
			"label_jobNotes" => "Bemerkungen",
			"button_text_waiting" => "Warte auf Eingabe..",
			"button_text_invalid" => "URL ist ungültig!",
			"button_text_enter_company" => "Neues Unternehmen eingeben",
			"button_text_add_company" => "Neues Unternehmen einfügen",
			"button_text_edit_company" => "Eintrag ändern",
			"button_text_add_job" => "Neuen Job einfügen",
			"button_text_edit_job" => "Eintrag ändern",
			"button_text_cancel" => "Abbrechen",
			"warning_msg_exist" => "existiert bereits in",
			"warning_msg_similar_exist" => "ähnliche URL gefunden in",
			"error_msg_fetch_failed" => "Wir bitten um Verzeihung. Beim Laden der Daten ist ein Fehler aufgetreten!",
			"error_msg_submit_failed" => "Wir bitten um Verzeihung. Beim Verarbeiten der Daten ist ein Fehler aufgetreten!",
			"error_msg_move_failed" => "Wir bitten um Verzeihung. Beim Verschieben der Daten ist ein Fehler aufgetreten!",
			"error_msg_delete_failed" => "Wir bitten um Verzeihung. Beim Löschen der Daten ist ein Fehler aufgetreten!",
			"l1" => "FAVORITEN",
			"l2" => "INTERESSANT, ABER ..",
			"l3" => "SCHWARZE LISTE"
		),
		"jp" => array( // 11 japanese (127 Mio./128 Mio.) | (Japan[G8] <04|2012:101,23Mio->2014:109,25Mio>)
			"label_searchfield" => "ここで会社のURLを追加するか、または与える"
		),
		"sk" => array( // 12 koreanisch (78 Mio./78 Mio.) | (South Korea <12|2012:40,33Mio->2014:->45,31Mio>, North Korea)
			"label_searchfield" => "추가 여기에 회사의 URL을 제공"
		),
		"in" => array( // 13 indonesisch (?) (Indonesia <13|2012:55Mio->2014:42,26Mio>)
			"label_searchfield" => "Tambah atau memberikan URL perusahaan di sini"
		),
		"vi" => array( // 14 vietnamesisch (?) (Vietnam <15|2012:31,03Mio->2014:39,77Mio>)
			"label_searchfield" => "Thêm hoặc cung cấp cho các công ty ở đây URL"
		),
		"it" => array( // 15 italiano (?) (Italy[G8] <17|2012:35,8Mio->2014:36,59Mio>)
			"label_searchfield" => "Aggiungere o dare alla società URL qui"
		),
		"tu" => array( // 16 türkisch (?) (Turkey[G8] <18|2012:36,46Mio->2014:35,36Mio>)
			"label_searchfield" => "Ekle veya burada şirket URL vermek"
		)
		// english, filipino (Philippinen <16|2012:33,6Mio->2014:39,47Mio>)
	);

?>