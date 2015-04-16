<html>
<head>
	<title>Pemesanan Bahan | Waroeng Steak and Shake</title>

	<!-- css template -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- css bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<!-- css custom -->
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	
</head>

<body>
	<div class="top">
		<div class="form-pemesanan">
			<div class="header">
				<h1>Form Pemesanan</h1>
				<span>Isi Form di Bawah Ini</span>
			</div>
			<div class="form-before">
				<button class="btn btn-default add-form" type="submit" id="tambah-bahan">+ Tambah Bahan</button>
			</div>
			<div class="form-content">
			<form class="form-inline" id="form-bahan" name="form-bahan" action="pesan_bahan.php" method="post" onsubmit="return addBahan(); ">
				<div class="content-parent">
					<div class="content">
						<div class="form-group nama-bahan">
							<label>Nama Bahan</label>
							<select class="form-control" name="option_0" id="option_0">
								<option>Daging</option>
								<option>Wortel</option>
								<option>Kentang</option>
								<option>Saus</option>
								<option>Tepung</option>
								<option>Merica</option>
								<option>Garam</option>
								<option>Susu</option>
								<option>Kopi</option>
							</select>
						</div>
                        <input type="hidden" name="counter_total" id="counter_total" value="1">
                        <input type="hidden" name="username" id="username" value="<?php echo $_GET["u"] ?>">
						<div class="form-group jumlah-bahan">
							<label>Jumlah</label>
							<input type="text" name="jumlah_0" id="jumlah_0" class="form-control form-jumlah" value="Jumlah" onfocus="this.value='';" onblur="if(this.value=='') {this.value = 'Jumlah'}">
							kg
						</div>
					</div>
				</div>
				<div>
					<button class="btn btn-default send-button" id="send-button">Submit</button>
				</div>
			</form>
			<div class="bottom-bar"></div>
			</div>
		</div>
	</div>
	<div class="response">
		
	</div>
</body>
<script type="text/javascript">
        var counter = 1;
			$(".add-form").click(function(e) {
                var text = '<div class="content">\
					<div class="form-group nama-bahan">\
						<label>Nama Bahan</label>\
						<select class="form-control" name="option_' + counter + '" id="option_' + counter + '">\
								<option>Daging</option>\
								<option>Wortel</option>\
								<option>Kentang</option>\
								<option>Saus</option>\
								<option>Tepung</option>\
								<option>Merica</option>\
								<option>Garam</option>\
								<option>Susu</option>\
								<option>Kopi</option>\
						</select>\
					</div>\
					<div class="form-group jumlah-bahan">\
						<label for="jumlah">Jumlah</label>\
						<input type="text" name="jumlah_' + counter + '" id="jumlah_'+counter+'" class="form-control form-jumlah" value="Jumlah" onfocus="this.value=\' \';" onblur="if(this.value==\' \')\
							{this.value = \'Jumlah\'}">\
						kg\
					</div>\
					</div>';
				$(".content-parent").append(text);
                counter++;
                document.getElementById("counter_total").value = counter;
			});
	</script>
	<script>
    function addBahan(){
        if(cekJumlah() == false){
            return false;
        }
        else{
            return confirm("Apa anda yakin ?");
        }
    }

    function cekJumlah(){
        var i = 0;
        while(i < counter){
            var jum = "jumlah_" + i;
            if($('#'+jum).val() == "Jumlah"){
                alert("Jumlah bahan harus diisi!")
                return false;
            }
            i++;
        }
        return true;
    }

</script>
</html>