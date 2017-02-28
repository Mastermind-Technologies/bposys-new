<tr class='data'>
     <td>
          <select class=form-control>
               <option selected disabled>Select Line of Business</option>
               <?php foreach ($business_activity as $key => $activity): ?>
                    <option value="<?= $this->encryption->encrypt($activity->name) ?>"><?=$activity->name ?></option>
               <?php endforeach ?>
          </select>
     </td>
     <td>
          <input type='text' data-parsley-type='digits' class=form-control>
     </td>
</tr>