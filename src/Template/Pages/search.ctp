<style>
.search-result-list{
    list-style: none;
}
.search-result-list li{
    padding:10px;
    margin-bottom: 15px;
    border-bottom: 1px solid;
    padding-bottom: 30px;
}
.read-more-btn{
    margin-top:10px;
    padding: 9px;
    font-size: 12px;
}
</style>
<div class="cp-software">
    <section class="cp-cs-app pad-100">
        <div class="container">
            <h1 class="cp-title">Search Result</h1>
            <div class="row">
                <div class="cp-cs-imac visible-xs">
                    <img src="assets/images/customer-app.png" alt="" class="img-responsive" />
                </div>

                <div class="col-sm-6">
                    <ul class="search-result-list">
                    <?php foreach($pages as $p){ ?>
                        <li>                            
                            <h2 class="title"><?php echo $p->title; ?></h2>
                            <div class="excerpt_content"><?php echo $p->excerpt; ?></div>
                            <a href="<?php echo $this->Url->build($p->custom_url); ?>" class="btn btn-primary read-more-btn">Read more</a>

                        </li>
                    <?php } ?>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <div class="cp-cs-imac hidden-xs">
                        <img src="<?php echo $this->Url->build("/webroot/frontend/assets/images/customer-app.png"); ?>" alt="" class="img-responsive" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>