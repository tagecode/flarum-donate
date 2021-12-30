import app from 'flarum/forum/app';
import {extend} from 'flarum/common/extend';
import UserCard from "flarum/components/UserCard";
import EditUserModal from "flarum/components/EditUserModal"
import Stream from "flarum/utils/Stream";
import Model from "flarum/Model";
import User from "flarum/models/User";
import Donate from "./components/donate";

app.initializers.add('tagecode-donate', () => {
  User.prototype.donate = Model.attribute("donate");
  extend(EditUserModal.prototype, "oninit", function () {
    this.donate = Stream(this.attrs.user.attribute('donate'));
  });

  extend(UserCard.prototype, 'infoItems', function (items) {
    let user = this.attrs.user;
    if (!user.attribute('donate')) {
      return;
    }
    if (!items.has('Donate')) {
      items.add('Donate', <Donate user={user}/>);
    }

  });

  extend(EditUserModal.prototype, "fields", function (items) {
    items.add(
      "Donate",
      <div className="Form-group">
        <label>
          Donate
          <input
            className="FormControl"
            bidi={this.donate}
          />
        </label>
      </div>,
      1
    );
  });

  extend(EditUserModal.prototype, "data", function (data) {
    const user = this.attrs.user;
    if (this.donate !== user.donate) {
      data.donate = this.donate;
    }
  });

});
