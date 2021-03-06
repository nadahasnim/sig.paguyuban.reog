<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>About Us</h3>
                    <p>Sistem Informasi Geografis Persebaran Paguyuban Reog Kab. Jember</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="about_story">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="story_heading">
                    <h3>Our Story</h3>
                </div>
                <div class="row">
                    <div class="col-lg-11 offset-lg-1">
                        <div class="story_info">
                            <div class="row">
                                <div class="col-lg-9">
                                    <p>Consulting represents success at realizing the company is going in the wrong direction. The only time the company fails is when it is not possible to do a turnaround anymore. We help companies pivot into more profitable directions where they can expand and grow. It is inevitable that companies will end up making a few mistakes; we help them correct these mistakes.</p>
                                    <p>Consulting represents success at realizing the company is going in the wrong direction. The only time the company fails is when it is not possible to do a turnaround anymore. We help companies pivot into more profitable directions where they can expand and grow. It is inevitable that companies will end up making a few mistakes; we help them correct these mistakes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="story_thumb">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="thumb padd_1">
                                        <img src="<?= base_url('assets/landing/') ?>img/about/1.png" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="thumb">
                                        <img src="<?= base_url('assets/landing/') ?>img/about/2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="counter_wrap">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_counter text-center">
                                        <h3 class="counter">378</h3>
                                        <p>Tour has done successfully</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_counter text-center">
                                        <h3 class="counter">30</h3>
                                        <p>Yearly tour arrange</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="single_counter text-center">
                                        <h3 class="counter">2263</h3>
                                        <p>Happy Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (!$this->session->userdata('id_user')) : ?>
    <!-- newletter_area_start  -->
    <div class="newletter_area overlay">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="newsletter_text text-center">
                                <h4>Daftarkan Diri Anda</h4>
                                <p>Daftarkan diri anda untuk melakukan reservasi atau daftarkan Paguyuban Reog Anda untuk membuka reservasi</p>
                                <a class="boxed-btn4 mt-3" href="<?= base_url('auth/registration') ?>" type="submit">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newletter_area_end  -->
<?php endif; ?>