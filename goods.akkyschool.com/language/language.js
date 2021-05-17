
      var messages = {
        '英文': {
			register: 'register',
			login: 'login',
			search: 'search',
			goods_name: 'goods_name',
			goods_login: 'goods_login',
			goods_edit: 'goods_edit',
			manage_orders: 'manage_orders',
			teach_material: 'teach_material',
			japanese_boutique: 'japanese_boutique',
			Limiter: 'Limiter'
        },
        '日語': {
			register: 'アカウントを登録する',
			login: 'ログイン会員',
			search: '検索する',
			goods_name: '商品名',
			goods_login: '製品ログイン',
			goods_edit: '商品編集',
			manage_orders: '注文を管理する',
			teach_material: '教材',
			japanese_boutique: '日本のブティック',
			Limiter: 'リミッター'
        },
		'繁中': {
			register: '註冊帳號',
			login: '登入會員',
			search: '搜尋',
			goods_name: '商品名稱',
			goods_login: '商品登錄',
			goods_edit: '商品編輯',
			manage_orders: '管理訂單',
			teach_material: '教材用具',
			japanese_boutique: '日本精品',
			Limiter: '限定物'
		}
      }
   
      Vue.use(VueI18n)

      var initial = '日語'
      var i18n = new VueI18n({
        locale: initial,
        messages: messages,
      })

      var vm = new Vue({
        i18n: i18n,
        data: {
          locale: initial,
        },
        watch: {
          locale: function (val) {
            this.$i18n.locale = val
          }
        }
      }).$mount('#app')
      