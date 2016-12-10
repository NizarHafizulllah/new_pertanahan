      <section class="content">
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

      <?php 
            $userdata = $this->session->userdata('kec_login'); 
      ?>
      
      <div class="callout callout-info" id="hide">
            <h4>Selamat Datang <b><?php echo $userdata['nama'] ?></b>!</h4>
            <p>Selamat Datang Di Sistem Informasi Pertanahan. Anda telah login sebagai admin kecamatan</p>
            <p>Anda mempunyai beberapa wewenang pada aplikasi ini sebagai mana yang telah di tetapkan. Click untuk menghilangkan pesan ini.</p>
          </div>
      </section>

      <script type="text/javascript">
      	
      	$(document).ready(function(){
      		$('#hide').click(function(){
      			$('#hide').slideUp('slow');
      		});
      	});
      </script>
