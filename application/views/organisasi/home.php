  <section id="team" class="team">
    <div class="container">
      <?php foreach ($organisasi as $or) { ?>
        <div class="section-title">
          <h2><?= $or['nama_organisasi'] ?></h2>
          <img src="<?= base_url() ?>assets/<?= $or['logo'] ?>" width="150px">
          <p><br><br><?= $or['tujuan'] ?></p>
          <hr>
          <p><?= $or['visimisi'] ?></p>
        </div>
      <?php } ?>
  </section>