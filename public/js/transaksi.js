$(document).ready(function() {
  // SOPIRCHECK
  $("#sopirCheck").change(function() {
    if (this.checked) {
      $("#showSopir")
        .removeClass("d-none")
        .addClass("d-inline");
    } else {
      $("#showSopir")
        .removeClass("d-inline")
        .addClass("d-none");
      $("#Sopir").val("SPR000");
      $("#TarifSopirPerhari").val(0);
    }
  });

  // MOBIL
  $("#Mobil").change(function() {
    var harga = $("option:selected", this).attr("harga");
    $("#TarifMobilPerhari").val(harga);
    total();
  });

  // SOPIR
  $("#Sopir").change(function() {
    var harga = $("option:selected", this).attr("harga");
    $("#TarifSopirPerhari").val(harga);
    total();
  });

  // RANGE DATE
  $("#Tanggal_Kembali").change(function() {
    var tanggalMulai = $("input[name='Tanggal_Pinjam_submit']").val();
    var tanggalAkhir = $("input[name='Tanggal_Kembali_submit']").val();

    var tanggalMulai = moment(tanggalMulai);
    var tanggalAkhir = moment(tanggalAkhir);

    var lamaRental = tanggalAkhir.diff(tanggalMulai, "days");

    $("#LamaRental").val(lamaRental);

    total();
  });

  function total() {
    // Mengambil nilai dari input
    var hargaSewaMobil = parseFloat($("#TarifMobilPerhari").val().replace(/\./g, '').replace(',', '.'));
    var lamaRental = parseFloat($("#LamaRental").val());
    var tarifSopir = parseFloat($("#TarifSopirPerhari").val().replace(/\./g, '').replace(',', '.'));

    // Menghitung total pembayaran
    var bayarMobil = hargaSewaMobil * lamaRental;
    var bayarSopir = tarifSopir * lamaRental;
    var totalBayar = bayarMobil + bayarSopir;

    // Mengubah nilai input dengan format yang diinginkan
    $("#BayarMobil").val(bayarMobil.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0}));
    $("#BayarSopir").val(bayarSopir.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0}));
    $("#TotalBayar").val(totalBayar.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0}));

    // Menghapus tanda titik atau koma sebelum mengirimkan nilai ke server
    $("#TarifMobilPerhari").val(hargaSewaMobil);
    $("#TarifSopirPerhari").val(tarifSopir);
	$("#TotalBayar").val(totalBayar);
}


  $("#Tanggal_Kembali, #LamaRental, #Tanggal_Pinjam").change(function() {
    total();
  });

  $(".tombol_selesai").on("click", function() {
    $(".selesai").on("show.bs.modal", function() {
		var tanggalRencana = $("input[name='Tanggal_Kembali_selesai_submit']", this).val();
		//console.log("Tanggal_Kembali_selesai_submit:", tanggalRencana);
		var jamKembali = $("input[name='pulang']", this).val();
		var tanggalRencanaMoment = moment(tanggalRencana + " " + jamKembali);
		var waktuSaatIni = moment();

		// Menghitung perbedaan dalam jam antara waktu saat ini dan tanggalRencana
		var diffInHours = waktuSaatIni.diff(tanggalRencanaMoment, "hours");

		// Jika perbedaan jam kurang dari 0, atur ke 0
		diffInHours = Math.max(0, diffInHours);

		// Hitung jumlah hari
		//var JatuhTempo = Math.floor(diffInHours / 24);
		var JatuhTempo = parseFloat(Math.floor(diffInHours / 24));


		// Hitung sisa jam
		var sisaJam = diffInHours % 24;

		// Jika perbedaan jam kurang dari atau sama dengan satu hari, atur jumlah hari menjadi 0
		if (diffInHours <= 24) {
			JatuhTempo = 0;
		}
		console.log("JatuhTempo:", JatuhTempo, "hari", sisaJam, "jam");

		$("#terlambatki", ".selesai").text(sisaJam + " jam");
		
        $("#JatuhTempo", ".selesai").val(JatuhTempo);
	  
	
	    var SewaMobilnya = parseFloat(
        $("#TarifMobilPerhari_selesai", this)
          .val()
          .replace(/\D/g, "")
		);
	  
	    var totalSementara2 = parseFloat(
        $("#TotalBayar_selesai", this).val().replace(/\./g, '').replace(',', ''));
        
		// var hasilDenda = Denda + totalSementara;
		  // $("#TotalBayar_selesai", this)
			// .val(hasilDenda)
			// .mask("0.000.000.000", { reverse: true });
		
	    var nihil = "0";
        var nihilAsFloat = parseFloat(nihil);
        var cas = nihilAsFloat; // Inisialisasi variabel cas dengan nilai nihilAsFloat
		$("#telat").val(cas).mask("0.000.000.000", { reverse: true });
		
	    var panjarnya = parseFloat($("#panjar", this).val()) + 0;
		$("#panjar", this)
			.val(panjarnya.toFixed(0)) // Convert to fixed format without decimal places
			.mask("0.000.000.000", { reverse: true });
		console.log("Nilai panjarnya:", panjarnya);
		//console.log("Biaya Kerusakan:", BiayaKerusakan)
		//console.log("BBM:", BiayaBBM)

		XtraCharges = JatuhTempo * SewaMobilnya ;
		$(".selesai #telat").val(XtraCharges.toLocaleString());
		telat = XtraCharges;
		
		$("#telat", ".selesai").on("keyup", function() {
			var XtraCharges = parseFloat($(this).val().replace(/\D/g, ""));
			telat = XtraCharges;
			var telatValue = parseFloat($("#telat", ".selesai").val());

			console.log("hasil Denda:", XtraCharges);
			console.log("hasil Cas:", cas);

			
			TotalAkhir();
			TotalAkhirPelanggan();
			$("input#Dendax", ".selesai").attr("type", "text").prop("readonly", true);
			XtraCharges2 = JatuhTempo * SewaMobilnya ;
			$("#Dendax", ".selesai").val(XtraCharges2.toLocaleString());
		});

		$(document).on("keyup", "input#BiayaKerusakan.biaya-kerusakan", function() {
			// Mendapatkan nilai dari input dengan ID "BiayaKerusakan" dan kelas "biaya-kerusakan"
			var rusak = parseFloat($(this).val().replace(/\D/g, "")); // Mengambil nilai dari input dan mengonversi ke float
			
			// Memperbarui nilai variabel BiayaKerusakan dengan nilai baru
			window.BiayaKerusakan = rusak;

			// Panggil fungsi atau lakukan apa pun yang diperlukan setelah nilai BiayaKerusakan diperbarui
			TotalAkhir(); // Misalnya, memanggil fungsi TotalAkhir() (asumsi telah didefinisikan di tempat lain)
			TotalAkhirPelanggan(); // Misalnya, memanggil fungsi TotalAkhirPelanggan() (asumsi telah didefinisikan di tempat lain)
		});


		$(document).on("keyup", "input#BiayaBBM.bbm", function() {
			// Mendapatkan nilai dari input dengan ID "BiayaBBM" dan kelas "biaya-kerusakan"
			var BBM = parseFloat($(this).val().replace(/\D/g, "")); // Mengambil nilai dari input dan mengonversi ke float
			
			// Memperbarui nilai variabel BiayaBBM dengan nilai baru
			window.BiayaBBM = BBM;

			// Panggil fungsi atau lakukan apa pun yang diperlukan setelah nilai BiayaBBM diperbarui
			TotalAkhir(); // Misalnya, memanggil fungsi TotalAkhir() (asumsi telah didefinisikan di tempat lain)
			TotalAkhirPelanggan(); // Misalnya, memanggil fungsi TotalAkhirPelanggan() (asumsi telah didefinisikan di tempat lain)
		});
		 
		 
	//Hitung Total Akhir
      function TotalAkhir() {
			// Perhitungan totalAkhirBayar
			var totalAkhirBayar = parseFloat(totalSementara2 + telat + BiayaKerusakan + BiayaBBM);
			var totalAkhirBayar2 = parseFloat(totalAkhirBayar - panjarnya);
			//var totalAkhirBayar3 = parseFloat(totalAkhirBayar2 + XtraCharges);

			// Memasukkan nilai totalAkhirBayar ke dalam elemen HTML dengan ID TotalBayar_selesai
			$("#TotalBayar_selesai", ".selesai")
				.val(totalAkhirBayar2)
				.mask("0.000.000.000", { reverse: true });
			$("#Totalnyami", ".selesai")
				.val(totalAkhirBayar2)
				.mask("0.000.000.000", { reverse: true });
		}
	  

	// hitungan Pembayaran Totalnya
      
		function TotalAkhirPelanggan() {
		var totalAkhirBayar2 = parseFloat($("#TotalBayar_selesai", ".selesai").val().replace(/[^0-9.-]+/g,""));
		var totalAkhirBayar2 = parseFloat($("#Totalnyami", ".selesai").val().replace(/[^0-9.-]+/g,""));


			totalPelanggan = totalAkhirBayar2 - JumlahBayar;

			if (!isNaN(totalPelanggan)) {
				// Memberikan format pemisah angka pada nilai totalPelanggan
				var formattedTotalPelanggan = totalPelanggan.toLocaleString();
				//var formattedTotalBayar = totalPelanggan.toLocaleString();

				$("#Kembalian", ".selesai")
					.val(formattedTotalPelanggan);
				

				// Ubah nilai status_bayar menjadi "Lunas" jika totalPelanggan sama dengan 0
				if (JumlahBayar > totalAkhirBayar2 || JumlahBayar === totalAkhirBayar2) {
					$("#status_bayar", ".selesai").val("Lunas");
					$("#Kembalian", ".selesai").val("0");
					$("#sisa_bayar", ".selesai").val("0");
					$("#JumlahBayar", ".selesai").val(totalAkhirBayar2.toLocaleString()).prop('readonly', true);
				} else if (JumlahBayar < totalAkhirBayar2) {
					$("#status_bayar", ".selesai").val("Belum");
					$("#sisa_bayar", ".selesai").val(formattedTotalPelanggan);
				}
			}
		}

       $("#JumlahBayar", this).keyup(function() {
			TotalAkhir();

				JumlahBayar = parseFloat(
				   $(this)
					 .val()
				 );
				 
				 $("input#TotalBayar_selesai", ".selesai").attr("type", "text").prop("readonly", true).addClass("uang");

				 TotalAkhirPelanggan();
			});
			
			TotalAkhir();
			  
    });
	
//batas hitungan total Pemesanan

  });
  
//Awal Hitungan Tunggakan Transaksi
$(".tombol_tunggakan").on("click", function() {
	$(".tunggakan").on("show.bs.modal", function() {
	  
	  var totalSementara = parseFloat(
         $("#Total_Tunggakan", this)
           .val()
           .replace(/\D/g, "")
      );
	  
	  var totalSebenarnya = parseFloat(
         $("#initotalx", this)
           .val()
           .replace(/\D/g, "")
      );
	  
	  var tbayar = parseFloat(
         $("#jmlx", this)
           .val()
           .replace(/\D/g, "")
      );
	  
	  var nihil = parseFloat(0);

      function TotalAkhir() {
        totalAkhirBayar = parseFloat(totalSementara + nihil );

        $("#Total_Tunggakan", ".tunggakan")
          .val(totalAkhirBayar)
          .mask("0.000.000.000", { reverse: true });
      }
	  
	  function bayarannya() {
        byr = parseFloat(tbayar + nihil );

        $("#jmlx", ".tunggakan")
          .val(byr)
          .mask("0.000.000.000", { reverse: true });
      }
	  
	  //var Jbayar = parseFloat($("#Jbayar").val()); // Misalnya, diambil dari elemen dengan id "Jbayar"
var totalAk = parseFloat($("#JumlahBayar").val()); // Misalnya, diambil dari elemen dengan id "totalAkhirBayar"

function paidnya() {
    var byr = parseFloat($("#jmlx", ".tunggakan").val());
    var bayarmi;

    if (Jbayar >= totalAk) {
        bayarmi = byr;
    } else {
        bayarmi = byr + Jbayar;
    }

    if (!isNaN(bayarmi)) {
        // Atur nilai pada elemen input dengan id "jmlx" dalam kelas "tunggakan"
        $("#jmlx", ".tunggakan")
            .val(byr.toLocaleString("id-ID", { maximumFractionDigits: 0 }));

        // Atur nilai pada elemen input dengan id "JumlahBayar" dalam kelas "tunggakan"
        if (Jbayar >= totalAk) {
            $("#JumlahBayar", ".tunggakan").val(totalAk);
        } else {
            $("#JumlahBayar", ".tunggakan")
                .val(bayarmi.toLocaleString("id-ID", { maximumFractionDigits: 0 }));
        }
    }
}

	function TotalAkhirPelanggan() {
	var byr = parseFloat($("#jmlx", ".tunggakan").val());
    var totalAkhirBayar = parseFloat($("#Total_Tunggakan", ".tunggakan").val());
    var totalPelanggan = totalAkhirBayar - Jbayar;
	var formattedValue = totalSebenarnya.toLocaleString("id-ID");

    if (!isNaN(totalPelanggan)) {
        // Atur nilai pada elemen input dengan id "Total_Tunggakan" dalam kelas "tunggakan"
        $("#Total_Tunggakan", ".tunggakan")
            .val(totalAkhirBayar.toLocaleString("id-ID", { maximumFractionDigits: 0 }));

        // Atur nilai pada elemen input dengan id "Kembalian" dalam kelas "tunggakan"
        $("#Kembalian", ".tunggakan")
            .val(totalPelanggan.toLocaleString("id-ID", { maximumFractionDigits: 0 }));

        // Ubah nilai status_bayar menjadi "Lunas" jika totalPelanggan sama dengan 0
        if (Jbayar >= totalAkhirBayar) {
            $("#status_bayar", ".tunggakan").val("Lunas");
            $("#Kembalian", ".tunggakan").val("0");
            $("#sisa_bayar", ".tunggakan").val(totalPelanggan.toLocaleString("id-ID", { maximumFractionDigits: 0 }));
            $("#Jbayar", ".tunggakan").val(totalAkhirBayar.toLocaleString("id-ID", { maximumFractionDigits: 0 }));
            $("#sisa_bayar", ".tunggakan").val("0");
			$("#JumlahBayar", ".tunggakan").val(formattedValue);
        } else {
            $("#status_bayar", ".tunggakan").val("Belum");
            $("#sisa_bayar", ".tunggakan").val(totalPelanggan.toLocaleString("id-ID", { maximumFractionDigits: 0 }));
        }
    }
}


      $("#Jbayar", this).keyup(function() {
        bayarannya();
		TotalAkhir();

        Jbayar = parseFloat(
          $(this)
            .val()
            .replace(/\D/g, "")
        );
		paidnya();
        TotalAkhirPelanggan();
      });
			

	});
	});
// batas hitungan

	
//Reload Modal
$(".selesai, .tunggakan").on("hidden.bs.modal", function() {
    location.reload();
});
//Batas Reload Modal


});
