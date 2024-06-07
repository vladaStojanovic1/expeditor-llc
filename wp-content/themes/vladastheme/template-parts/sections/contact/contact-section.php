<?php
$contact_title = get_field('contact_title');
$contact_text = get_field('contact_text');
$info_company_address = get_field('info_company_address');
$info_office_address = get_field('info_office_address');
$info_telephone_text = get_field('info_telephone_text');
$info_dispatch_number = get_field('info_dispatch_number');
$info_fax_number = get_field('info_fax_number');
$info_email_main = get_field('info_email_main');
$info_email_dispatch = get_field('info_email_dispatch');
$info_email_safety = get_field('info_email_safety');
$info_email_billing = get_field('info_email_billing');
$map_iframe = get_field('map_iframe');
?>
<section class="m-contact">
    <div class="_wr">
        <div class="m-contact__top">
            <h2><?php echo $contact_title; ?></h2>
            <span class="a-line"></span>
<!--            <p>--><?php //echo $contact_text; ?><!--</p>-->
        </div>

        <div class="_w">
            <div class="_l5 m-contact__maps">
                <?php echo $map_iframe;?>
            </div>

            <div class="_l7">
                <div class="m-contact__info">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M12 11.925q.8 0 1.375-.563.575-.562.575-1.362t-.575-1.375Q12.8 8.05 12 8.05t-1.362.575q-.563.575-.563 1.375t.563 1.362q.562.563 1.362.563Zm0 7.5q3.075-2.825 4.575-5.125t1.5-4.1q0-2.775-1.763-4.525Q14.55 3.925 12 3.925q-2.55 0-4.3 1.75T5.95 10.2q0 1.8 1.488 4.1Q8.925 16.6 12 19.425Zm0 2.475q-4-3.425-5.963-6.325-1.962-2.9-1.962-5.375 0-3.725 2.388-5.938Q8.85 2.05 12 2.05t5.55 2.212q2.4 2.213 2.4 5.938 0 2.475-1.962 5.375-1.963 2.9-5.988 6.325Zm0-11.7Z"/></svg>
                        <div>
                            <p>Office:</p>
                            <p><?php echo $info_office_address; ?></p>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M12 11.925q.8 0 1.375-.563.575-.562.575-1.362t-.575-1.375Q12.8 8.05 12 8.05t-1.362.575q-.563.575-.563 1.375t.563 1.362q.562.563 1.362.563Zm0 7.5q3.075-2.825 4.575-5.125t1.5-4.1q0-2.775-1.763-4.525Q14.55 3.925 12 3.925q-2.55 0-4.3 1.75T5.95 10.2q0 1.8 1.488 4.1Q8.925 16.6 12 19.425Zm0 2.475q-4-3.425-5.963-6.325-1.962-2.9-1.962-5.375 0-3.725 2.388-5.938Q8.85 2.05 12 2.05t5.55 2.212q2.4 2.213 2.4 5.938 0 2.475-1.962 5.375-1.963 2.9-5.988 6.325Zm0-11.7Z"/></svg>
                        <div>
                            <p>Company:</p>
                            <p><?php echo $info_company_address; ?></p>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M4.125 19.775q-.775 0-1.325-.55-.55-.55-.55-1.325V6.1q0-.775.55-1.325.55-.55 1.325-.55h15.75q.775 0 1.325.55.55.55.55 1.325v11.8q0 .775-.55 1.325-.55.55-1.325.55ZM12 12.9 4.125 7.975V17.9h15.75V7.975Zm0-1.875L19.85 6.1H4.15Zm-7.875-3.05V6.1v11.8Z"/></svg>
                        <div>
                            <p>Main:</p>
                            <a href="mailto:<?php echo $info_email_main; ?>"><?php echo $info_email_main; ?></a>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M4.125 19.775q-.775 0-1.325-.55-.55-.55-.55-1.325V6.1q0-.775.55-1.325.55-.55 1.325-.55h15.75q.775 0 1.325.55.55.55.55 1.325v11.8q0 .775-.55 1.325-.55.55-1.325.55ZM12 12.9 4.125 7.975V17.9h15.75V7.975Zm0-1.875L19.85 6.1H4.15Zm-7.875-3.05V6.1v11.8Z"/></svg>
                        <div>
                            <p>Dispatch:</p>
                            <a href="mailto:<?php echo $info_email_dispatch; ?>"><?php echo $info_email_dispatch; ?></a>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M4.125 19.775q-.775 0-1.325-.55-.55-.55-.55-1.325V6.1q0-.775.55-1.325.55-.55 1.325-.55h15.75q.775 0 1.325.55.55.55.55 1.325v11.8q0 .775-.55 1.325-.55.55-1.325.55ZM12 12.9 4.125 7.975V17.9h15.75V7.975Zm0-1.875L19.85 6.1H4.15Zm-7.875-3.05V6.1v11.8Z"/></svg>
                        <div>
                            <p>Safety:</p>
                            <a href="mailto:<?php echo $info_email_safety; ?>"><?php echo $info_email_safety; ?></a>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M4.125 19.775q-.775 0-1.325-.55-.55-.55-.55-1.325V6.1q0-.775.55-1.325.55-.55 1.325-.55h15.75q.775 0 1.325.55.55.55.55 1.325v11.8q0 .775-.55 1.325-.55.55-1.325.55ZM12 12.9 4.125 7.975V17.9h15.75V7.975Zm0-1.875L19.85 6.1H4.15Zm-7.875-3.05V6.1v11.8Z"/></svg>
                        <div>
                            <p>Biling:</p>
                            <a href="mailto:<?php echo $info_email_billing; ?>"><?php echo $info_email_billing; ?></a>
                        </div>
                    </div>


                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M7.075 22.75q-.775 0-1.325-.55-.55-.55-.55-1.325V3.125q0-.775.55-1.325.55-.55 1.325-.55h9.85q.775 0 1.325.55.55.55.55 1.325v17.75q0 .775-.55 1.325-.55.55-1.325.55Zm0-4.875v3h9.85v-3ZM12 20.35q.425 0 .7-.275.275-.275.275-.7 0-.425-.275-.7-.275-.275-.7-.275-.4 0-.688.275-.287.275-.287.7 0 .4.275.687.275.288.7.288ZM7.075 16h9.85V6.05h-9.85Zm0-11.825h9.85v-1.05h-9.85Zm0 13.7v3Zm0-13.7v-1.05 1.05Z"/></svg>
                        <div>
                            <p>Main:</p>
                            <a href="tel:<?php echo $info_telephone_text; ?>"><?php echo $info_telephone_text; ?></a>
                        </div>
                    </div>

                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M7.075 22.75q-.775 0-1.325-.55-.55-.55-.55-1.325V3.125q0-.775.55-1.325.55-.55 1.325-.55h9.85q.775 0 1.325.55.55.55.55 1.325v17.75q0 .775-.55 1.325-.55.55-1.325.55Zm0-4.875v3h9.85v-3ZM12 20.35q.425 0 .7-.275.275-.275.275-.7 0-.425-.275-.7-.275-.275-.7-.275-.4 0-.688.275-.287.275-.287.7 0 .4.275.687.275.288.7.288ZM7.075 16h9.85V6.05h-9.85Zm0-11.825h9.85v-1.05h-9.85Zm0 13.7v3Zm0-13.7v-1.05 1.05Z"/></svg>
                        <div>
                            <p>Direct Dispatch:</p>
                            <a href="tel:<?php echo $info_dispatch_number; ?>"><?php echo $info_dispatch_number; ?></a>
                        </div>
                    </div>

                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M7.075 22.75q-.775 0-1.325-.55-.55-.55-.55-1.325V3.125q0-.775.55-1.325.55-.55 1.325-.55h9.85q.775 0 1.325.55.55.55.55 1.325v17.75q0 .775-.55 1.325-.55.55-1.325.55Zm0-4.875v3h9.85v-3ZM12 20.35q.425 0 .7-.275.275-.275.275-.7 0-.425-.275-.7-.275-.275-.7-.275-.4 0-.688.275-.287.275-.287.7 0 .4.275.687.275.288.7.288ZM7.075 16h9.85V6.05h-9.85Zm0-11.825h9.85v-1.05h-9.85Zm0 13.7v3Zm0-13.7v-1.05 1.05Z"/></svg>
                        <div>
                            <p>Fax:</p>
                            <a href="tel:<?php echo $info_fax_number; ?>"><?php echo $info_fax_number; ?></a>
                        </div>
                    </div>
                </div>
              <div class="m-contact__bottom">
                  <div class="m-contact__bottom--hours">
                      <p>Office hours: &nbsp; 9am - 5pm</p>
                      <p>24/7 online support</p>
                  </div>
                  <div class="m-contact__social">
                      <?php if( have_rows('icons_repeater') ): ?>
                          <?php while( have_rows('icons_repeater') ): the_row();
                              $social_icon = get_sub_field('social_icon');
                              $social_icon_url = get_sub_field('social_icon_url');?>
                              <a target="_blank" href="<?php echo $social_icon_url; ?>">
                                  <img src="<?php echo $social_icon; ?>" alt="">
                              </a>
                          <?php endwhile;?>
                      <?php endif;?>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>

