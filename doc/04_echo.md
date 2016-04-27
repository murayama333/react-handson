# Reactハンズオン 4/5

## Part4 Echo - ハンズオン

ここでは入力した内容を表示するReactアプリケーションを作成します。

![](../img/04_echo.png)

開発は以下の手順で進めます。

1. ライブラリの設定
2. コンポーネント仕様を定義
3. コンポーネントクラスをレンダリング

### 1. ライブラリの設定

titleタグ以外は前章と同じです。ファイル名は04_echo.htmlという名前で保存しておきます。

```javascript
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello React 04</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
</head>
<body>
</body>
</html>
```

### 2. コンポーネント仕様を定義

ここでは画面の入力を受け付けるテキストボックスと、入力された名前を表示する領域を持ったとEchoコンポーネントクラスを作成します。

Echoコンポーネントの仕様は以下のとおりです。

```javascript
var Echo = React.createClass({
    getInitialState: function() {
        return {
            name: ""
        };
    },

    echo: function(e){
        this.setState({name: e.target.value});
    },

    render: function() {
        return (
            <div>
            <h1>Welcome to WEBZ.</h1>
            <h3>Please type your name.</h3>
            <input type="text" onChange={this.echo} />
            <h3>{this.state.name}</h3>
            </div>
        );
    }
});
```

renderメソッド以外にgetInitialState、echoメソッドの2つが追加されています。getInitialStateメソッドの説明に入る前にReactのステートについて学習しておきましょう。

Reactにはステートという仕組みがあります。ステートとはコンポーネントの状態を表すものです。先のEchoコンポーネントには、「（入力された）名前」を示すnameというステートがあります。Reactのコンポーネントはステートの内容が更新されると自動的に再描画（renderメソッド呼び出し）されるようになっています。

getInitialStateメソッドはReactコンポーネントのライフサイクルメソッドの1つで、コンポーネントインスタンスの生成時に呼び出されます。getInitialStateメソッドでステートの初期値を設定できます。

```javascript
getInitialState: function() {
    return {
        name: ""
    };
},
```

上記のコードではnameステートの初期値を空文字で設定しています。

つづいてechoメソッドを見てみましょう。

```javascript
echo: function(e){
    this.setState({name: e.target.value});
},
```

echoメソッドはgetInitialStateのようなReactに依存したものではなく、アプリケーション独自のメソッドです。echoメソッドはrenderメソッドの中でinputタグのonChangeイベントハンドラに関連付けられています。

```html
<input type="text" onChange={this.echo} />
```

これによって、テキストボックスの値に変化が生じるとechoメソッドが呼び出されるようになります。echoメソッドの中では、コンポーネントのステートを更新するためにsetStateメソッドを呼び出しています。Reactは内部で仮想DOMによってコンポーネントを管理しているため、ステートを更新する場合、必ずsetStateメソッドを使用する必要があります。

> this.state.name = e.target.value; のように記述してはいけません。

echoメソッドによってステートが更新されるとコンポーネントのrenderメソッドがReactによって呼び出されます。

```javascript
render: function() {
    return (
        <div>
        <h1>Welcome to WEBZ.</h1>
        <h3>Please type your name.</h3>
        <input type="text" onChange={this.echo} />
        <h3>{this.state.name}</h3>
        </div>
    );
}
```

これによってテキストっボックスに入力した内容が即座に画面に表示されるようになります。


### 3. コンポーネントクラスをレンダリング

作成したコンポーネントクラス（Echo）を画面にレンダリングします。

```javascript
ReactDOM.render(
    <Echo />,
    document.getElementById('example')
);
```

Echoコンポーネントにプロパティの指定はありません。


ここまでの作業をまとめると次のようになります。

```javascript
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello React 04</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
</head>
<body>
    <div id="example"></div>
    <script type="text/babel">

    var Echo = React.createClass({
        getInitialState: function() {
            return {
                name: ""
            };
        },

        echo: function(e){
            this.setState({name: e.target.value});
        },

        render: function() {
            return (
                <div>
                <h1>Welcome to WEBZ.</h1>
                <h3>Please type your name.</h3>
                <input type="text" onChange={this.echo} />
                <h3>{this.state.name}</h3>
                </div>
            );
        }
    });

    ReactDOM.render(
        <Echo />,
        document.getElementById('example')
    );
    </script>
</body>
</html>
```
