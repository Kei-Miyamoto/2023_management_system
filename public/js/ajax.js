$(function () {
    // 検索フォームのsubmitイベント
    $('#search-form').submit(function (event) {
        // フォームのsubmitイベントをキャンセル
        event.preventDefault();
        // 検索キーワードを取得
        var keyword = $('#search-keyword').val();
        var productName = $("#product_name").val();
        if (productName !== undefined && productName.indexOf(keyword) !== -1) {
            // productNameがkeywordを含む場合の処理
        }
        var companyName = $("#company_name").val();
        if (companyName !== undefined && companyName.indexOf(keyword) !== -1) {
            // companyNameがkeywordを含む場合の処理
        }
        $.ajax({
            url: '/2023_management_system/public/plist',
            type: 'GET',
            // 検索キーワードを送信する
            data: { keyword: keyword },
            dataType: 'json'
        })
            .done(function (data) {
                // テーブルのtbody要素を取得
                var tbody = $('#search-result');
                // 現在の商品一覧表示をクリア
                tbody.empty();

                // JSONデータをループしてテーブルに追加
                $.each(data.products.data, function (i, product) {
                    var row = $('<tr>');
                    row.append($('<td>').text(product.id));
                    row.append($('<td>').html('<img src="' + product.img_path + '" alt="' + product.product_name + '" width="50" height="50">'));
                    row.append($('<td>').text(product.product_name));
                    row.append($('<td>').text(product.price));
                    row.append($('<td>').text(product.stock));
                    row.append($('<td>').text(product.company.company_name));
                    row.append($('<td>').html('<a href="/2023_management_system/public/detail/' + product.id + '"><button type="submit" class="btn btn-info">詳細</button></a>'));
                    row.append($('<td>').html('<form onsubmit="return confirm(\'本当に削除しますか？\')" action="/2023_management_system/public/delete/' + product.id + '" method="post">@csrf@method(\'delete\')<button type="submit" class="btn btn-danger">削除</button></form>'));
                    tbody.append(row);
                });
                // ページネーションを更新
                $('.pagination').html(data.products.links);
            })
            .fail(function (XMLHttpRequest, textStatus, errorThrown) {
                alert('検索に失敗しました。');
                console.log("XMLHttpRequest : " + XMLHttpRequest.status);
                console.log("textStatus     : " + textStatus);
                console.log("errorThrown    : " + errorThrown.message);
            });
    });
});