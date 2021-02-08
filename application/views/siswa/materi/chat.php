 <ul class="conversation-list">
     <?php foreach ($chat as $key => $value) {
            $date = date('H:i', strtotime($value->date_send));
        ?>
         <?php if ($value->id_users === $id_users) { ?>
             <li class="clearfix odd">
                 <div class="chat-avatar">
                     <img src="http://www.emsateknik.com.tr/wp-content/uploads/2018/01/avatar-png-1-450x450.png" alt="Female">
                     <i><?= $date ?></i>
                 </div>
                 <div class="conversation-text">
                     <div class="ctext-wrap chat-widgets-cn">
                         <i><?= $value->nama ?></i>
                         <p>
                             <?= $value->pesan ?>
                         </p>
                     </div>
                 </div>
             </li>
         <?php } else { ?>
             <li class="clearfix">
                 <div class="chat-avatar">
                     <img src="http://www.emsateknik.com.tr/wp-content/uploads/2018/01/avatar-png-1-450x450.png" alt="male">
                     <i><?= $date ?></i>
                 </div>
                 <div class="conversation-text">
                     <div class="ctext-wrap">
                         <i><?= $value->nama ?></i>
                         <p>
                             <?= $value->pesan ?>
                         </p>
                     </div>
                 </div>
             </li>
         <?php } ?>
     <?php } ?>
 </ul>