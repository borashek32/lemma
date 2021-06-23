<?php

function showSharer($url, $message){
//powered by https://sharingbuttons.io/
?>
<a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode($message) ?>%20
            <?php echo urlencode($url) ?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
    <img src="/img/social_icons/facebook.png" width="30px" alt="Поделиться на FaceBook">
</a>

<a class="resp-sharing-button__link" href="whatsapp://send?text=<?php echo urlencode($message) ?>%20
            <?php echo urlencode($url) ?>" target="_blank" rel="noopener" aria-label="SПоделиться на WhatsApp">
    <img src="/img/social_icons/whatsapp.png" width="30px" alt="Поделиться на WhatsApp">
</a>

<a class="resp-sharing-button__link" href="https://vk.com/share.php?url=<?php echo urlencode($url) ?>"
   target="_blank" rel="noopener" aria-label="Share on VKontakte">
    <img src="/img/social_icons/vkontakte.jpg" width="30px" alt="Поделиться на VKontakte">
</a>

<a class="resp-sharing-button__link" href="https://telegram.me/share/url?text=<?php echo urlencode($message) ?>
    &amp;url=<?php echo urlencode($url) ?>" target="_blank" rel="noopener" aria-label="Share on Telegram">
    <img src="/img/social_icons/telegram.png" width="30px" alt="Поделиться в Telegram">
</a>
<?php
}
