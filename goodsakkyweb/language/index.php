<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>datetime localization</title>
<script src='https://unpkg.com/vue/dist/vue.js'></script>
<script src='https://unpkg.com/vue-i18n/dist/vue-i18n.js'></script>
  </head>
  <body>
    <div id="app">
      <select v-model="locale">
        <option>英文</option>
        <option>日語</option>
        <option>繁中</option>
        <option>簡中</option>
      </select>
      <p>{{ $t('current_datetime')}}</p>
      <p>{{ $t('date')}}</p>
    </div>
	<script src="language.js"></script>
  </body>
</html>
