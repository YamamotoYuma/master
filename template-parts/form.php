<div class="bl_inquiry_wrapper">
    <table class="bl_inquiry js_inquiry">
        <tr>
            <th>
                <span class="el_label el_label__need">必須</span><span>会社名</span>
            </th>
            <td>
                [text* your-cope class:textsp class:need placeholder"例）株式会社○○○"]
            </td>
        </tr>
        <tr>
            <th>
                <span class="el_label el_label__need">必須</span><span>お名前</span>
            </th>
            <td>
                [text* your-name class:textsp class:need placeholder"例）田中太郎"]
            </td>
        </tr>
        <tr>
            <th>
                <span class="el_label el_label__need">必須</span><span>お名前（フリガナ）</span>
            </th>
            <td>
                [text* your-rubi class:textsp class:name_rubi placeholder"例）タナカタロウ"]
            </td>
        </tr>
        <tr>
            <th>
                <span class="el_label el_label__need">必須</span><span>電話番号</span>
            </th>
            <td>
                [tel* your-tel class:tel class:tell_number placeholder"例）0545677075"]
            </td>
        </tr>
        <tr>
            <th>
                <span class="el_label el_label__need">必須</span><span>メールアドレス</span>
            </th>
            <td>[email* your-email class:mailsp class:mail_address placeholder"例）info@example.com"]</td>
        </tr>
        <tr>
            <th>
               <span class="el_label el_label__any">任意</span><span>ドロップダウンメニュー</span>
            </th>
            <td>
                [select dpmenu class:drop first_as_label "ご選択ください" "サンプル1" "サンプル2" "サンプル3"]
            </td>
        </tr>
        <tr>
            <th>
               <span class="el_label el_label__need">必須</span><span>郵便番号</span>
            </th>
            <td>
                [text* your-postalcode class:need zip id:zip placeholder"例）123-4567"]
            </td>
        </tr>
        <tr>
            <th>
               <span class="el_label el_label__need">必須</span><span>都道府県</span>
            </th>
            <td>
                [text* your-prefectures class:need pref id:pref placeholder"例）◯◯県"]
            </td>
        </tr>
        <tr>
            <th>
                <span class="el_label el_label__need">必須</span><span>市区町村</span>
            </th>
            <td>
                [text* your-addresscity id:city class:need addr id:addr placeholder"例）○○市○○町"]
            </td>
        </tr>
        <tr>
            <th>
             <span class="el_label el_label__need">必須</span><span>番地・マンション名など</span>
            </th>
            <td>
                [text* your-addressnum id:num class:need addr placeholder"例）1-2-3　○○ビル3F"]
            </td>
        </tr>
        <tr>
            <th>
               <span class="el_label el_label__any">任意</span><span>チェックボックス【複数選択可】</span>
            </th>
            <td>
                [checkbox checkbox-1 use_label_element class:verticallist check "検索" "求人サイト" "イベント・勉強会" "知人からの紹介"]</td>
        </tr>
        <tr>
            <th>
                 <span class="el_label el_label__need">必須</span><span>ラジオボタン</span>
            </th>
            <td>
                [radio radio-1 use_label_element class:verticallist class:radio "商談のご相談""サービスに関するお問い合わせ""採用に関するお問い合わせ""その他"]
            </td>
        </tr>
        <tr>
            <th>
                <span class="el_label el_label__any">任意</span><span>面談希望日</span>
            </th>
            <td>
                [date date-960 placeholder class:datesp]
            </td>
        </tr>
        <tr>
            <th>
                <span class="el_label el_label__any">任意</span><span>お問い合わせ内容</span>
            </th>
            <td>
                [textarea your-message class:content placeholder "ご自由にご記入ください"]
            </td>
        </tr>
    </table>
</div>
<div class="el_btn_submit_wrapper">[submit id:formbtn class:el_btn_submit "送信する"]</div>
<script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = 'http://master.local/thanks';
    }, false );
</script>