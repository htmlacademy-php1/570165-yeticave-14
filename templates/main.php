
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <!--заполните этот список из массива категорий-->
            <?php foreach ($categories as $value): ?>
                <li class="promo__item promo__item--boards">
                    <a class="promo__link" href="pages/all-lots.html"><?= htmlspecialchars($value) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <!--заполните этот список из массива с товарами-->
            <?php foreach($adverts as $key => $value):
                $res = back_hors_min($value['time_lot_end']) ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?= htmlspecialchars($value['url']) ?>" width="350" height="260" alt="">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?= htmlspecialchars($value['category']) ?></span>
                        <h3 class="lot__title"><a class="text-link" href="pages/lot.html">
                                <?= htmlspecialchars($value['title']) ?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?= htmlspecialchars(format_price( $value['price']) ) ?></span>
                            </div>

                            <div class="lot__timer timer <?= $res[0] < 1 ? 'timer--finishing':'' ?> ">
                                <?= str_pad($res[0], 2, '0', STR_PAD_LEFT) ?>
                                :
                                <?= str_pad($res[1], 2, '0', STR_PAD_LEFT) ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
