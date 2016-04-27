# Reactハンズオン 1/5

## Reactとは

ReactはUIをつくるためのJavaScriptライブラリです。

+ JUST THE UI
    + MVCでいうところのV
+ VIRTUAL DOM
    + 仮想DOMを使うので、DOM操作系のライブラリは使わない。
+ DATA FLOW
    + リアクティブなプログラミング

## Part1 Hello React - ハンズオン

ここでは次のような画面にHello Worldと表示するReactアプリケーションを作成します。


![](../img/01_hello.png)

開発は以下の手順で進めます。

1. ライブラリの設定
2. コンポーネント仕様を定義
3. コンポーネントクラスをレンダリング


### 1. ライブラリの設定

Reactで配布されてるreact.js、react-dom.jsを使用します。

```javascript
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js" charset="utf-8"></script>
```

また、JSXをサポートするためにBabelのbrowser.min.jsを使用します。

```
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
```

ここまでの作業をまとめると以下のとおりです。ファイル名は01_hello.htmlという名前で保存しておきます。

```javascript
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello React 01</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
</head>
<body>
</body>
</html>
```


### 2. コンポーネント仕様を定義

これからJavaScriptをゴリゴリ記述していくので、HTMLファイルのbodyタグの中にscriptタグを定義します。scriptタグのtype属性にはtext/babelを指定してください。JSXシンタックスが利用できます。

```html
<body>
    <div id="example"></div>
    <script type="text/babel">
    </script>
</body>
```

divタグはこれから作成するコンポーネントのコンテナとなる要素です。

ここでは画面にHello Worldと出力するコンポーネント仕様を定義し、コンポーネントクラスHelloWorldを作成します。ReactはコンポーネントをJSXで定義可能です。

scriptタグの中に以下のコードを記述します。

```javascript
var HelloWorld = React.createClass({
    render : function(){
        return (
            <h1>Hello World</h1>
        );
    }
});
```

React.createClassに指定したオブジェクトをコンポーネント仕様と呼びます。コンポーネント仕様には必ずrenderメソッドを定義しなくてはいけません。

またReact.createClassの戻り値をコンポーネントクラスと呼びます。ここではHelloWorldという名前のコンポーネントクラスを定義しました。コンポーネントクラスは先頭文字を大文字で記述するとコードが読みやすくなります。


### 3. コンポーネントクラスをレンダリング

作成したコンポーネントクラスを画面にレンダリングします。ReactDOM.renderメソッドの引数にコンポーネントクラス、コンポーネントのコンテナとなるDOM要素を指定します。


```javascript
ReactDOM.render(
    <HelloWorld />,
    document.getElementById('example')
);
```

ここまでの作業をまとめると次のようになります。

```javascript
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hello React 01</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.0.1/react-dom.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
</head>
<body>
    <div id="example"></div>
    <script type="text/babel">
    var HelloWorld = React.createClass({
        render : function(){
            return (
                <h1>Hello World</h1>
            );
        }
    });

    ReactDOM.render(
        <HelloWorld />,
        document.getElementById('example')
    );
    </script>
</body>
</html>
```
