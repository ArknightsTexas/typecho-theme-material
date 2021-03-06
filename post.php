<?php $this->need('header.php'); ?>

<div class="material-layout  mdc-js-layout has-drawer is-upgraded">

    <main class="material-layout__content mdc-layout-grid" id="main">
        <div id="top"></div>
        <!-- Hamburger Button -->
        <button class="MD-burger-icon sidebar-toggle">
            <span id="MD-burger-id" class="MD-burger-layer"></span>
        </button>

        <!-- Post module -->
        <div class="material-post_container">
            <div class="material-post mdc-layout-grid__inner">

                <!-- Article title -->
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-card">
                    <div class="post_thumbnail-custom mdc-card__media mdc-color-text--grey-50" style="background-image: url(<?php echo showThumbnail($this); ?>);">
                        <p class="article-headline-p">
                            <?php $this->title() ?>
                        </p>
                    </div>

                    <!-- Article info -->
                    <div class="mdc-color-text--grey-700 mdc-card__supporting-text meta">
                        <!-- Author avatar -->
                        <div id="author-avatar">
                            <?php if (!empty($this->options->avatarURL)): ?>
                                <img src="<?php $this->options->avatarURL() ?>" width="44px" height="44px" alt="Author Avatar">
                            <?php else: ?>
                                <?php $this->author->gravatar(44); ?>
                            <?php endif; ?>
                        </div>

                        <div>
                            <!-- Author name -->
                            <strong><?php $this->author(); ?></strong>
                            <!-- Articel date -->
                            <span>
                            <?php if ($this->options->language != 'zh-CN'): ?>
                                <?php $this->date('F j, Y'); ?>
                            <?php else: ?>
                                <?php $this->dateWord(); ?>
                            <?php endif; ?>
                        </span>
                        </div>
                        <div class="section-spacer"></div>
                        <?php if (getThemeOptions("qrcode") != "false"): ?>
                        <button id="article-functions-qrcode-button" class="mdc-button mdc-js-button mdc-js-ripple-effect mdc-button--icon">
                            <i class="material-icons" role="presentation">devices other</i>
                            <span class="visuallyhidden">devices other</span>
                        </button>
                        <ul class="mdc-menu mdc-menu--bottom-right mdc-js-menu mdc-js-ripple-effect" for="article-functions-qrcode-button">
                            <li class="mdc-menu__item"><?php lang("post.qrcode") ?></li>
                            <img src="<?php getQRCode($this->permalink); ?>" height="200" width="200">
                        </ul>
                        <?php endif; ?>
                        <!-- view tags -->
                        <?php if (count($this->tags)): ?>
                        <button id="article-functions-viewtags-button" class="mdc-button mdc-js-button mdc-js-ripple-effect mdc-button--icon">
                            <!-- For modern browsers. -->
                            <i class="material-icons" role="presentation">bookmarks</i>
                            <span class="visuallyhidden">tags</span>
                        </button>
                        <ul class="mdc-menu mdc-menu--bottom-right mdc-js-menu mdc-js-ripple-effect" for="article-functions-viewtags-button">
                            <li class="mdc-menu__item">
                                <?php $this->tags('<li class="mdc-menu__item" style="text-decoration: none;"> ', true, ''); ?></li>
                        </ul>
                        <?php endif; ?>
                        <!-- share -->
                        <button id="article-fuctions-share-button" class="mdc-button mdc-js-button mdc-js-ripple-effect mdc-button--icon">
                            <i class="material-icons" role="presentation">share</i>
                            <span class="visuallyhidden">share</span>
                        </button>
                        <ul class="mdc-menu mdc-menu--bottom-right mdc-js-menu mdc-js-ripple-effect" for="article-fuctions-share-button">
                            <?php if ($this->user->hasLogin()):?>
                                <a class="md-menu-list-a" href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank">
                                    <li class="mdc-menu__item">编辑</li>
                                </a>
                            <?php endif;?>
                            <a class="md-menu-list-a" href="https://www.facebook.com/sharer/sharer.php?u=<?php $this->permalink(); ?>">
                                <li class="mdc-menu__item">
                                <?php lang("share.toFacebook") ?>
                                </li>
                            </a>
                            <a class="md-menu-list-a" href="https://telegram.me/share/url?url=<?php $this->permalink() ?>&text=<?php $this->title(); ?>" >
                                <li class="mdc-menu__item">
                                <?php lang("share.toTelegram") ?>
                                </li>
                            </a>
                            <a class="md-menu-list-a" href="https://twitter.com/intent/tweet?text=<?php $this->title() ?>&url=<?php $this->permalink() ?>&via=<?php $this->user->screenName(); ?>">
                                <li class="mdc-menu__item">
                                <?php lang("share.toTwitter") ?>
                                </li>
                            </a>
                            <a class="md-menu-list-a" href="https://plus.google.com/share?url=<?php $this->permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                <li class="mdc-menu__item">
                                <?php lang("share.toGplus") ?>
                                </li>
                            </a>
                            <a class="md-menu-list-a" href="http://service.weibo.com/share/share.php?appkey=&title=<?php $this->title(); ?>&url=<?php $this->permalink(); ?>&pic=&searchPic=false&style=simple ">
                                <li class="mdc-menu__item">
                                <?php lang("share.toWeibo") ?>
                                </li>
                            </a>
                        </ul>
                    </div>

                    <!-- Articel content -->
                    <div id="post-content" class="mdc-color-text--grey-700 mdc-card__supporting-text fade out">
                        <?php
                        if (!empty($this->options->switch) && in_array('PanguPHP', $this->options->switch)) {
                            print pangu($this->content);
                        } else {
                            $this->content(); 
                        }
                        ?>
                        <?php if (!empty($this->options->post_license)): ?>
                            <blockquote style="margin: 2em 0 0;padding: 0.5em 1em;border-left: 3px solid #F44336;background-color: #F5F5F5;list-style: none;">
                                <p>
                                    <strong><?php lang("post.permalink"); echo "<a href=\"" . $this->permalink . "\">" . $this->permalink . "</a>" ;?></strong><br>
                                    <strong><?php $this->options->post_license(); ?></strong>
                                </p>
                            </blockquote>
                        <?php endif;?>
                    </div>

                    <!-- Article comments -->
                    <?php include('comments.php'); ?>

                </div>

                <?php if (!empty($this->options->adsense)): ?>
                    <div class="mdc-card mdc-shadow--4dp mdc-cell mdc-cell--12-col" style="min-height: 100px!important;">
                        <?php $this->options->adsense() ?>
                    </div>
                <?php endif; ?>

                <!-- theNext thePrev button -->
                <nav class="material-nav mdc-color-text--grey-50 mdc-cell mdc-cell--12-col">
                    <?php $this->theNext('%s', null, array('title' => '
                        <button class="mdc-button mdc-js-button mdc-js-ripple-effect mdc-button--icon mdc-color--white mdc-color-text--grey-900" role="presentation">
                            <i class="material-icons">arrow_back</i>
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . lang("post.newer", false) . '', 'tagClass' => 'prev-content')); ?>
                    <div class="section-spacer"></div>
                    <?php $this->thePrev('%s', null, array('title' =>  lang("post.older", false) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="mdc-button mdc-js-button mdc-js-ripple-effect mdc-button--icon mdc-color--white mdc-color-text--grey-900" role="presentation">
                            <i class="material-icons">arrow_forward</i>
                        </button>', 'tagClass' => 'prev-content')); ?>
                </nav>
            </div>

            <?php include('sidebar.php'); ?>
            <?php include('footer.php'); ?>
