<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>A simple, clean, and responsive HTML invoice template</title>

		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: 50px auto auto auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
            .btn-outline-primary a{
                text-decoration: none;
            }
            .btn-outline-primary a:hover{
                text-decoration: none;
                color: white;
            }
            .btn-primary a{
                text-decoration: none;
                color: white;
            }
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="{{url('asset/front-end/image/logo-perusahaan.jpg')}}" alt="Company logo" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									kode booking: {{$tiket -> reservation -> booking_code}}<br />
									Created at: {{ date('d F Y', strtotime($tiket->created_at)) }}<br />
									Updated at: {{ date('d F Y', strtotime($tiket->updated_at)) }}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Windira<br />
									Jl. Saledri No.19, Lengkong, <br />
									Bandung, Jawa Barat
								</td>

								<td>
									+62 21981341121<br />
									info@windiraproduction.net
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading fw-normal">
					<td>Status pembayaran</td>

				</tr>

				<tr class="details fw-bold text-success">
					<td>{{$tiket -> status_pembayaran}}</td>

				</tr>

				<tr class="heading">
					<td>Detail pemesanan</td>

					<td>Detail Harga</td>
				</tr>

                
				<tr class="item">
					<td>Jumlah reservasi yang dipesan</td>

					<td>{{$tiket -> reservation -> quantity}} tiket/kamar</td>
				</tr>

				<tr class="item">
					<td>Destinasi: {{$tiket -> reservation -> destinasi_hotel}}</td>

					<td>Rp. {{number_format($tiket -> reservation -> biaya,0)}}</td>
				</tr>



			</table>
		</div>
        <div class="mt-4 mb-4 d-print-none">
            <a href="/"><button type="button" class="btn btn-outline-primary me-3"><i class="fa fa-home me-2" aria-hidden="true"></i>Kembali ke home</button></a>
			@if($tiket -> status_pembayaran == 'approved')
            <a href="" id="printPDF" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-print me-2" aria-hidden="true"></i>Cetak pdf</button></a>
			@endif
        </div>
	</body>
    <script src="https://use.fontawesome.com/91cc53682f.js"></script>
	<script>
		document.getElementById("printPDF").addEventListener("click", function(event){
		event.preventDefault()
		window.print();
		});
		
	</script>
</html>