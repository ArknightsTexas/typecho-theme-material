<?php
/**
 * 这是 <a href="https://viosey.com/" target="_blank">Viosey</a> 基于 Google Material Design 开发的 Typecho 主题，目前 Typecho 版由 <a href="https://blog.lim-light.com/" target="_blank">黎明余光</a> 维护
 *
 * @package Material
 * @author 黎明余光
 * @version 3.3.4
 * @link https://blog.lim-light.com
 */

$this->need('header.php'); ?>

<div class="material-layout mdc-js-layout has-drawer is-upgraded">

    <main class="material-layout__content mdc-layout-grid" id="main">

        <!-- Top Anchor -->
        <div id="top"></div>

        <!-- Hamburger Button -->
        <button class="MD-burger-icon sidebar-toggle">
            <span id="MD-burger-id" class="MD-burger-layer"></span>
        </button>

        <div class="mdc-layout-grid__inner">

            <?php if ($this->is('index') && $this->_currentPage == 1): ?>
            <!-- Daily Pic -->
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8 mdc-card mdc-shadow--<?php $this->options->CardElevation() ?>dp daily-pic index-top-block">
                <?php if (!empty($this->options->dailypic)): ?>
                <div class="mdc-card__media mdc-color-text--grey-50"
                     style="background-image:url(<?php $this->options->dailypic() ?>)">
                    <?php else: ?>
                    <div class="mdc-card__media mdc-color-text--grey-50"
                         style="background-image:url(<?php getThemeFile("img/daily_pic.png", true) ?>)">
                        <?php endif; ?>
                        <p class="index-top-block-slogan"><a
                                    href="<?php $this->options->dailypicLink() ?>"><?php $this->options->slogan() ?></a>
                        </p>
                    </div>

                    <div class="mdc-card__supporting-text meta mdc-color-text--grey-600">
                        <!-- Author avatar -->
                        <div id="author-avatar">
                            <?php if (!empty($this->options->avatarURL)): ?>
                                <img src="<?php $this->options->avatarURL() ?>" width="32px" height="32px"/>
                            <?php else: ?>
                                <?php $this->author->gravatar(32); ?>
                            <?php endif; ?>
                        </div>
                        <div>
                            <strong><?php $this->author(); ?></strong>
                        </div>
                    </div>
                </div>

                <!-- Blog info -->
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 mdc-card mdc-shadow--<?php $this->options->CardElevation() ?>dp something-else mdc-cell mdc-cell--8-col mdc-cell--4-col-desktop index-top-block">
                    <!-- Search -->
                    <?php if ((!empty($this->options->searchis) && $this->options->searchis == '1')): ?>
                        <div class="mdc-text-field text-field mdc-text-field--fullwidth mdc-text-field--no-label mdc-ripple-upgraded">
                            <button id="search-label"
                                   class="mdc-fab"
                                   for="search">
                                <div class="mdc-fab__ripple"></div>
                                <i class="material-icons mdc-fab__icon" role="presentation">search</i>
                            </button>
                            <form autocomplete="off" id="search-form" method="post" action=""
                                  class="mdc-textfield__expandable-holder">
                                <input type="text" id="search" class="form-control mdc-text-field__input search-input"
                                       name="s" results="0" placeholder=""/>
                                <label id="search-form-label" class="mdc-textfield__label" for="search"></label>
                            </form>
                        </div>
                        <div id="local-search-result"></div>
                    <?php else: ?>
                        <div class="mdc-textfield mdc-js-textfield mdc-textfield--expandable">
                            <label id="search-label"
                                   class="mdc-button mdc-js-ripple-effect mdc-js-button mdc-button--fab mdc-color--accent mdc-shadow--4dp"
                                   for="search">
                                <i class="material-icons mdc-color-text--white" role="presentation">search</i>
                            </label>
                            <form autocomplete="off" id="search-form" method="post" action=""
                                  class="mdc-textfield__expandable-holder">
                                <input class="mdc-textfield__input search-input" type="text" name="s" id="search">
                                <label id="search-form-label" class="mdc-textfield__label" for="search"></label>
                            </form>
                        </div>
                    <?php endif; ?>
                    <!-- LOGO -->
                    <div class="something-else-logo mdc-color--white mdc-color-text--grey-600">
                        <?php if (!empty($this->options->logoLink)): ?>
                        <a href="<?php $this->options->logoLink() ?>">
                            <?php else: ?>
                            <a href="#">
                                <?php endif; ?>
                                <?php if (!empty($this->options->logo)): ?>
                                    <?php if (!empty($this->options->logosize) && $this->options->logosize == "2"): ?>
                                        <img style="width: 12pc; height: 12pc; margin-top: -2pc"
                                             src="<?php $this->options->logo() ?>">
                                    <?php else: ?>
                                        <img src="<?php $this->options->logo() ?>">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <img src="<?php getThemeFile('img/logo.png', true) ?>">
                                <?php endif; ?>
                            </a>
                    </div>
                    <!-- Infomation -->
                    <div class="mdc-card__supporting-text meta meta--fill mdc-color-text--grey-600">
                        <div>
                            <strong><?php $this->options->title(); ?></strong>
                        </div>
                        <div class="section-spacer"></div>
                        <!-- Pages button -->
                        <div class="mdc-menu-surface--anchor">
                            <button id="show-pages-button"
                                    class="mdc-icon-button">
                                <i class="material-icons mdc-icon-button__icon" role="presentation">view_carousel</i>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" for="show-pages-button">
                                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                                <ul class="mdc-list">
                                <?php while ($pages->next()): ?>
                                    <a href="<?php $pages->permalink(); ?>" class="index_share-link"
                                    title="<?php $pages->title(); ?>">
                                        <li class="mdc-list-item">
                                            <?php $pages->title(); ?>
                                        </li>
                                    </a>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>

                        <!--  Menu button-->
                        <div class="mdc-menu-surface--anchor">
                            <button id="menubtn" class="mdc-icon-button">
                                <i class="material-icons mdc-icon-button__icon" role="presentation">more_vert</i>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" for="menubtn">
                                
                                <ul class="mdc-list">
                                    <a href="<?php $this->options->feedUrl(); ?>" class="index_share-link">
                                        <li class="mdc-list-item">
                                            <?php lang("share.article_rss") ?>
                                        </li>
                                    </a>
                                    <!-- Share Menu -->
                                    <a class="index_share-link"
                                    href="https://www.facebook.com/sharer/sharer.php?u=<?php $this->options->siteUrl(); ?>">
                                        <li class="mdc-list-item">
                                            <?php lang("share.toFacebook") ?>
                                        </li>
                                    </a>
                                    <a class="index_share-link"
                                    href="https://telegram.me/share/url?url=<?php $this->options->siteUrl(); ?>&text=<?php $this->options->title(); ?>">
                                        <li class="mdc-list-item">
                                            <?php lang("share.toTelegram") ?>
                                        </li>
                                    </a>
                                    <a class="index_share-link"
                                    href="https://twitter.com/intent/tweet?text=<?php $this->options->title(); ?>&url=<?php $this->options->siteUrl(); ?>&via=<?php $this->author->screenName(); ?>">
                                        <li class="mdc-list-item">
                                            <?php lang("share.toTwitter") ?>
                                        </li>
                                    </a>
                                    <a class="index_share-link"
                                    href="https://plus.google.com/share?url=<?php $this->options->siteUrl(); ?>"
                                    onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                        <li class="mdc-list-item">
                                            <?php lang("share.toGplus") ?>
                                        </li>
                                    </a>
                                    <a class="index_share-link"
                                    href="http://service.weibo.com/share/share.php?appkey=&title=<?php $this->options->title(); ?>&url=<?php $this->options->siteUrl(); ?>&pic=&searchPic=false&style=simple ">
                                        <li class="mdc-list-item">
                                            <?php lang("share.toWeibo") ?>
                                        </li>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($this->getTotal() != 0): ?>
                    <?php while ($this->next()): ?>

                        <!-- Article module -->
                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 post_entry-module mdc-card mdc-shadow--<?php $this->options->CardElevation() ?>dp mdc-cell mdc-cell--12-col <?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>fade out<?php endif; ?>">

                            <!-- Article link & title -->
                            <?php if ($this->options->ThumbnailOption == '1'): ?>
                                <div class="post-thumbnail-pure mdc-card__media mdc-color-text--grey-50 lazy "
                                    <?php getBackgroundLazyload(showThumbnail($this)); ?>>
                                    <p class="article-headline-p"><a href="<?php $this->permalink() ?>"
                                                                     target="_self"><?php $this->title() ?></a></p>
                                </div>
                            <?php elseif ($this->options->ThumbnailOption == '2'): ?>
                                <div class="mdc-card__media mdc-color-text--grey-50"
                                     style="background-color:<?php $this->options->TitleColor() ?> !important;color:#757575 !important;">
                                    <p class="article-headline-p-nopic">
                                        <a href="<?php $this->permalink() ?>" target="_self">
                                            "<br><?php $this->title() ?><br>"
                                        </a>
                                    </p>
                                </div>
                            <?php elseif ($this->options->ThumbnailOption == '3'): ?>
                                <div class="post_thumbnail-random mdc-card__media mdc-color-text--grey-50 lazy "
                                    <?php getBackgroundLazyload(randomThumbnail($this)); ?>>
                                    <p class="article-headline-p"><a href="<?php $this->permalink() ?>"
                                                                     target="_self"><?php $this->title() ?></a></p>
                                </div>
                            <?php endif; ?>

                            <!-- Article content -->
                            <div class="mdc-color-text--grey-600 mdc-card__supporting-text post_entry-content">
                                <?php ($this->fields->description != "") ? $this->fields->description() : $this->excerpt(80, '...'); ?>
                                &nbsp;&nbsp;&nbsp;
                                <span>
                                <a href="<?php $this->permalink(); ?>" target="_self">
                                <?php lang("post.continue") ?>
                                </a>
                            </span>
                            </div>

                            <!-- Article info-->
                            <div id="post_entry-info">
                                <div class="mdc-card__supporting-text meta mdc-color-text--grey-600 "
                                     id="post_entry-left-info">
                                    <!-- Author avatar -->
                                    <div id="author-avatar">
                                        <?php if (!empty($this->options->avatarURL)): ?>
                                            <img src="<?php $this->options->avatarURL() ?>" width="44px" height="44px"/>
                                        <?php else: ?>
                                            <?php $this->author->gravatar(44); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <span class="author-name-span"><strong><?php $this->author(); ?></strong></span>
                                        <span>
                                        <?php if ($this->options->langis == '0'): ?>
                                            <?php $this->date('F j, Y'); ?>
                                        <?php else: ?>
                                            <?php $this->dateWord(); ?>
                                        <?php endif; ?>
                                    </span>
                                    </div>
                                </div>
                                <div id="post_entry-right-info" style="color:<?php $this->options->alinkcolor(); ?>">
                                    <span class="post_entry-category">
                                        <?php $this->category(', '); ?> |
                                    </span>
                                    <a href="<?php $this->permalink() ?>">
                                        <!-- Comment Count -->
                                        <?php $this->commentsNum('%d 评论'); ?>
                                    </a>

                                </div>

                            </div>

                        </div>

                    <?php endwhile; ?>

                <?php else: ?>
                    <!-- Article module -->
                    <div class="post_entry-module mdc-card mdc-shadow--<?php $this->options->CardElevation() ?>dp mdc-cell mdc-cell--12-col <?php if (!empty($this->options->switch) && in_array('ShowLoadingLine', $this->options->switch)): ?>fade out<?php endif; ?>">

                        <!-- Article link & title -->
                        <div class="post-thumbnail-pure mdc-card__media mdc-color-text--grey-50 lazy "
                            <?php getBackgroundLazyload(showThumbnail($this)); ?>>
                            <p class="article-headline-p"><a href="<?php $this->options->siteUrl() ?>"
                                                             target="_self"><?php $this->options->title() ?></a></p>
                        </div>


                        <!-- Article content -->
                        <div class="mdc-color-text--grey-600 mdc-card__supporting-text post_entry-content">
                            <span>
                                <?php if (getThemeOptions("language") === "zh-CN"): ?>未能找到相关文章<?php else: ?>Could not find related articles<?php endif; ?>
                                <a href="<?php $this->options->siteUrl(); ?>"
                                   target="_self"><?php if (getThemeOptions("language") === "zh-CN"): ?>回到主页<?php else: ?>Return to homepage<?php endif; ?></a>
                            </span>
                        </div>

                        <!-- Article info-->
                        <div id="post_entry-info">

                        </div>

                    </div>
                <?php endif; ?>
                <nav class="material-nav mdc-cell mdc-cell--12-col">
                    <?php $this->pageLink(
                        '<button class="mdc-button mdc-js-button mdc-js-ripple-effect mdc-button--icon"><i class="material-icons" role="presentation">arrow_back</i></button>'); ?>
                    <span class="page-number current"><?php if ($this->_currentPage > 1) {
                            echo $this->_currentPage;
                        } else {
                            echo 1;
                        } ?> of <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></span>

                    <?php $this->pageLink(
                        '<button class="mdc-button mdc-js-button mdc-js-ripple-effect mdc-button--icon"><i class="material-icons" role="presentation">arrow_forward</i></button>', 'next'); ?>
                </nav>

            </div>

            <?php include('sidebar.php'); ?>
            <?php include('footer.php'); ?>
