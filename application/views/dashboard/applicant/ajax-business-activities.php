<tr class='data line-of-business-row'>
     <td>
          <select class="form-control bus-activity">
               <option selected disabled>Select Line of Business</option>
               <?php foreach ($business_activity as $key => $activity): ?>
                    <option value="<?= $this->encryption->encrypt($activity->name) ?>"><?=$activity->name ?></option>
               <?php endforeach ?>
          </select>
     </td>
     <td>
          <input type='text' data-parsley-type='digits' class="form-control capitalization">
     </td>
</tr>