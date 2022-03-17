$(document).ready(function(){

		function sendStat(indent,params){
				var yandex = indent;
				var google = '/'+indent;
				var sendparams = params || false;
				var yaParams = [];
				
				if(sendparams == true) {
					yaParams.push({'URL': document.location.href});
				}

				ym(39452070, 'reachGoal', yandex, yaParams);
				//gtag('config', 'UA-143310226-2', {'page_path': google});
				console.log(indent);
		}



/*
		$('a[href="http://form.testinggo.ru/"]').click(function(){
			
			sendStat('zapisati_otpravka');

				$('#order-service form.send button[type="submit"]').click(function(){
						var name = $(this).parents('form.send').find('#inputName').val();
						var phone = $(this).parents('form.send').find('#inputPhone').val();
						if( name.length > 1 && phone.length > 1 )
						sendStat('klik_po_otpravit_zayavku',true);
				})
		})*/


		$('a[href="http://form.testinggo.ru/"]').click(function(){

		setTimeout(function(){

				 $('iframe#fancybox-frame').get(0).contentWindow.document.querySelector('input[type="submit"]').onclick = function(){
					         // void( yaCounter40647954.reachGoal('onsubmit_service') );
					          //void( yaCounter40647954.reachGoal('onsubmit_service') );
					          void(sendStat('zapisati_otpravka'));
                            //  void( gtag('config', 'UA-164666378-1', {'page_path': '/onsubmit_service'}) );
          

				 }
		},2500);  
		})

/*

		$('a[href="\/zayavka_HRsales.docx"]').click(function(){
			sendStat('klik_po_skachat_zayavku_zakazat_podbor');
		})

		$('a[href="\/Dogovor_posle_mesyatsa.docx"').click(function(){
			sendStat('klik_po_skachat_primer_zakazat_podbor');
		})	

		$('a.contacts-tel').click(function(){
			sendStat('klik_po_telefonu_kontakty_telo');
		})	

		$('a.contacts-email').click(function(){
			sendStat('klik_po_pochte_kontakty_telo');
		})	

		$('footer a[href^="tel"]').click(function(){

			sendStat('klik_po_telefonu_futer',true);

		})	

		$('footer a[href^="mailto"]').click(function(){
			sendStat('klik_po_pochte_futer', true);
		})	

		$('a[data-target="#callback"]').click(function(){
			sendStat('klik_po_zakazat1_OZ_kontakty');

			$('#callback form.send button[type="submit"]').click(function(){
					var name = $(this).parents('form.send').find('#InputName1').val();
					var phone = $(this).parents('form.send').find('#InputPhone1').val();
					if( name.length > 1 && phone.length > 1 )
					sendStat('klik_po_zakazat2_OZ_kontakty');
			})

		})


		$('a[data-target="#resume"]').click(function(){
			sendStat('klik_po_zagruzit_fail_resyme');
				$('#resume form.send button[type="submit"]').click(function(){
					var name = $(this).parents('form.send').find('#InputName2').val();
					var phone = $(this).parents('form.send').find('#InputPhone2').val();
					if( name.length > 1 && phone.length > 1 )
					sendStat('klik_po_otpravit_fail_resyme');
				})
		})


		$('a[data-target="#presentation"]').click(function(){
			sendStat('klik_po_zagruzit_fail_present');
				$('#presentation form.send button[type="submit"]').click(function(){
					var name = $(this).parents('form.send').find('#InputName3').val();
					var phone = $(this).parents('form.send').find('#InputPhone3').val();
					if( name.length > 1 && phone.length > 1 )
					sendStat('klik_po_otpravit_fail_present');
				})
		})*/

});