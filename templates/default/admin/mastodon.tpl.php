<div class = "row">
    <div class="col-md-10 col-md-offset-1">
        <?= $this->draw('admin/menu') ?>
        <h1>Syndicate to Mastodon</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <p>Your Mastodon plugin is installed. For configuration check your account settings. </p>

    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <?php
        if (!empty(\Idno\Core\site()->config()->mastodon)) {
            ?>
            <p> Following Mastodon servers are configured: </p>
            <?php
            $servers = \Idno\Core\site()->config()->mastodon;
            foreach ($servers as $servername => $details) {
                \Idno\Core\Idno::site()->logging()->log("Mastodon (admin details): " . var_export($details, true));
                if (!empty($details[0]['name'])) {
                    $name = $details[0]["name"];
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Server : <a href="https://<?= $name ?>" target="_blank"><?= $name ?></a>
                        </div>
                        <div class="panel-body" >
                            <p>
                                Authorized <strong><?= strftime('%Y-%m-%d', $details[0]['issued_at']) ?></strong>
                                by <strong><?= $details[0]['user'] ?></strong>.
                            </p>
                            <p>
                                ID: <?= substr($details[0]['client_id'], 0, 5) ?>&hellip;
                            </p>

                        </div>
                    </div>
                    <?php
                }
            }
        } else {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Server : none
                </div>
                <div class="panel-body" >
                    <p>
                        Authorized <strong>n/a</strong>
                        by <strong>n/a</strong>.
                    </p>
                    <p>
                        ID: n/a
                    </p>

                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
