<script>
export default {
  data() { return { msg: null } },
  created() {
    Echo.private('test').listen('NewArticleEvent', (name) => {
      console.log(name);
      this.msg = name.name;
      alert('Добавлена новая статья!');
    })
  }
}
</script>
