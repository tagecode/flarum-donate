import Component from "flarum/Component"

export default class Donate extends Component {
  view() {
    const user = this.attrs.user;
    const donate = user.attribute('donate');
    if (app.session.user === user) {
      return ''
    }
    return (
      <a aria-label="Donate" href={donate} target="_blank">Donate</a>
    );
  }
}
