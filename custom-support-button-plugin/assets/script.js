// カウント用の変数
let supportCount = 0;

// ボタンがクリックされたときの処理
document.addEventListener('click', function(event) {
    if (event.target && event.target.className === 'support-button') {
        supportCount++;
        event.target.nextElementSibling.innerText = supportCount;

        // ありがとうというメッセージを表示
        let thankYouMessage = document.createElement('span');
        thankYouMessage.className = 'thank-you-message';
        thankYouMessage.innerText = custom_support_button_vars.thank_you_message;
        event.target.parentNode.appendChild(thankYouMessage);

        setTimeout(function() {
            thankYouMessage.remove();
        }, 5000);
    }
});
