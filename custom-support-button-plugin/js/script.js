// サポートカウント用の変数を初期化します。
let supportCount = 0;
let isButtonDisabled = false;

// サポートボタン要素を取得します。
let supportButton = document.querySelector('.support-button');

// サポートボタン要素にクリックイベントのリスナーを追加します。
supportButton.addEventListener('click', function(event) {
    if (!isButtonDisabled) {
        // ボタンを無効化
        isButtonDisabled = true;

        // サポートカウントを増やす
        supportCount++;
        event.target.nextElementSibling.innerText = supportCount;

        // ありがとうというメッセージを表示する要素を作成
        let thankYouMessage = document.createElement('span');
        thankYouMessage.className = 'thank-you-message';
        thankYouMessage.innerText = 'ありがとうございます！';//javascriptの文章が出力されている

        // メッセージを表示する前に既存のメッセージを削除
        let existingMessage = event.target.parentNode.querySelector('.thank-you-message');
        if (existingMessage) {
            existingMessage.remove();
        }

        event.target.parentNode.appendChild(thankYouMessage);

        // 5秒後にメッセージとボタンの無効化を解除
        setTimeout(function() {
            thankYouMessage.remove();
            isButtonDisabled = false;
        }, 5000);
    }
});
