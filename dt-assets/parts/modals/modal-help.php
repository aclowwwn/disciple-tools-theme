<div class="reveal" id="help-modal" data-reveal>
    <?php
    $contact_fields = Disciple_Tools_Contact_Post_Type::instance()->get_custom_fields_settings();
    $contact_channels = Disciple_Tools_Contact_Post_Type::instance()->get_channels_list();
    $group_fields = Disciple_Tools_Groups_Post_Type::instance()->get_custom_fields_settings();
    $group_channels = Disciple_Tools_Groups_Post_Type::instance()->get_channels_list();
    /**
     * Contact Record
     */
    if ( is_singular( "contacts" ) ) :

        ?>
        <!--    Contact Details Tile  -->
        <div class="help-section" id="contact-details-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Contact Details", 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "This is the area where you can view and edit the contact details for this contact.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <ul>
                <li><strong><?php echo esc_html_x( "Contact Name", 'disciple_tools' ) ?></strong></li>
                <li><strong><?php echo esc_html( $contact_fields["overall_status"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["overall_status"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["assigned_to"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["assigned_to"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["subassigned"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["subassigned"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $contact_channels["phone"]["label"] ) ?></strong> <?php echo esc_html( $contact_channels["phone"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $contact_channels["email"]["label"] ) ?></strong> <?php echo esc_html( $contact_channels["email"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $contact_channels["address"]["label"] ) ?></strong> <?php echo esc_html( $contact_channels["address"]["description"] ) ?></li>
                <li><strong><?php echo esc_html_x( "Social Media", 'disciple_tools' ) ?></strong> - <?php echo esc_html_x( "Social media accounts for this contact.", 'Optional Documentation', 'disciple_tools' ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["location_grid"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["location_grid"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["people_groups"]["name"] ) ?></strong> <?php echo esc_html( $contact_fields["people_groups"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["age"]["name"] ) ?></strong> <?php echo esc_html( $contact_fields["age"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["gender"]["name"] ) ?></strong> <?php echo esc_html( $contact_fields["gender"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["sources"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["sources"]["description"] ) ?></li>

            </ul>
            <!-- end Contact Details modal -->
        </div>

        <!--    Contact Status  -->
        <div class="help-section" id="overall-status-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_fields["overall_status"]["name"] ) ?></h3>
            <p><?php echo esc_html( $contact_fields["overall_status"]["description"] ) ?></p>
            <ul>
                <?php foreach ( $contact_fields["overall_status"]["default"] as $option ): ?>
                    <li><strong><?php echo esc_html( $option["label"] ) ?></strong> - <?php echo esc_html( $option["description"] ?? "" ) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!--    Assigned to -->
        <div class="help-section" id="assigned-to-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_fields["assigned_to"]["name"] )?></h3>
            <p><?php echo esc_html( $contact_fields["assigned_to"]["description"] ) ?></p>
            <?php if ( current_user_can( "view_any_contacts" ) ) : ?>
                <p><strong><?php echo esc_html_x( "User workload status icons legend:", 'Optional Documentation', 'disciple_tools' ) ?></strong></p>
                <ul style="list-style-type:none">
                    <?php $workload_status_options = dt_get_site_custom_lists()["user_workload_status"] ?? [];
                    foreach ( $workload_status_options as $option_key => $option_val ): ?>
                        <li><span style="background-color: <?php echo esc_html( $option_val["color"] ) ?>; height:10px; padding: 0 5px; border-radius: 2px">&nbsp;</span> <?php echo esc_html( $option_val["label"] ) ?></li>
                    <?php endforeach ?>
                    <li><img src="<?php echo esc_html( get_template_directory_uri() . '/dt-assets/images/broken.svg' )?>" /> 2: <?php echo esc_html_x( "2 contacts need an update", 'disciple_tools' ) ?> </li>
                </ul>
            <?php endif; ?>
        </div>

        <!--    Subassigned to  -->
        <div class="help-section" id="subassigned-to-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_fields["subassigned"]["name"] ) ?></h3>
            <p><?php echo esc_html( $contact_fields["subassigned"]["description"] ) ?></p>
        </div>

        <!--    Quick Actions   -->
        <div class="help-section" id="quick-action-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Quick action buttons", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "These quick action buttons are here to aid you in updating the contact record faster and keep a count of how many times each action has be done.", 'Optional Documentation', 'disciple_tools' ) ?>
            <p><?php echo esc_html_x( "For example, If you click the 'No Answer' button 4 times, we will log that you attempted to reach this contact 4 times, but they did not answer.
                This action will also change the 'Seeker Path' to 'Contact Attempted'.", 'Optional Documentation', 'disciple_tools' ) ?>
            </p>
        </div>

        <!-- Contact Progress Tile -->
        <div class="help-section" id="contact-progress-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Progress", 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "Here you can track the progress of the contact's faith journey.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <ul>
                <li><strong><?php echo esc_html( $contact_fields["seeker_path"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["seeker_path"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["milestones"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["milestones"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["baptism_date"]["name"] ) ?></strong>
            </ul>
        </div>

        <!-- Seeker Path -->
        <div class="help-section" id="seeker-path-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_fields["seeker_path"]["name"] ) ?></h3>
            <p><?php echo esc_html( $contact_fields["seeker_path"]["description"] ) ?></p>
            <!-- <?php echo esc_html( $contact_fields["seeker_path"]["name"] ) ?> list -->
            <ul>
                <?php foreach ( $contact_fields["seeker_path"]["default"] as $option ): ?>
                    <li><strong><?php echo esc_html( $option["label"] ) ?></strong> - <?php echo esc_html( $option["description"] ) ?? "" ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Faith Milestones -->
        <div class="help-section" id="faith-milestones-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_fields["milestones"]["name"] ) ?></h3>
            <p><?php echo esc_html( $contact_fields["milestones"]["description"] ) ?></p>
            <!-- <?php echo esc_html( $contact_fields["milestones"]["name"] ) ?> list -->
<!--            <ul>-->
<!--                --><?php //foreach ( $contact_fields["milestones"]["default"] as $option ): ?>
<!--                    <li><strong>--><?php //echo esc_html( $option["label"] ) ?><!--</strong> - --><?php //echo esc_html( $option["description"] ) ?? "" ?><!--</li>-->
<!--                --><?php //endforeach; ?>
<!--            </ul>-->
        </div>

        <!-- Baptism Date -->
        <div class="help-section" id="baptism-date-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_fields["baptism_date"]["name"] ) ?></h3>
            <p><?php echo esc_html( $contact_fields["baptism_date"]["description"] ) ?></p>
        </div>

        <!--  Connections tile -->
        <div class="help-section" id="connections-help-text" style="display: none">
            <h4><?php echo esc_html_x( "Contact Connections", 'Optional Documentation', 'disciple_tools' ) ?></h4>
            <p><?php echo esc_html_x( "Connections this contact has with other contacts (and groups) in this system.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <ul>
                <li><strong><?php echo esc_html( $contact_fields["groups"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["groups"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["relation"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["relation"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["baptized_by"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["baptized_by"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["baptized"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["baptized"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["coached_by"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["coached_by"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $contact_fields["coaching"]["name"] ) ?></strong> - <?php echo esc_html( $contact_fields["coaching"]["description"] ?? "" ) ?></li>
            </ul>
        </div>

        <!--  Other tile  -->
        <div class="help-section" id="other-tile-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Other", 'disciple_tools' ) ?></h3>
            <h4><?php echo esc_html( $contact_fields["tags"]["name"] ) ?></h4>
            <p><?php echo esc_html( $contact_fields["tags"]["description"] ) ?></p>
        </div>

    <?php endif; ?>

    <?php
    /**
     * Group record
     */
    if ( is_singular( "groups" ) ) : ?>

        <!-- Group Details Tile -->
        <div class="help-section" id="group-details-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Group Details", 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "This is the area where you can view and edit the contact details for this group.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <ul>
                <?php //$field = Disciple_Tools_Groups_Post_Type::instance()->get_custom_fields_settings()["group_name"]; ?>
                <li><strong><?php echo esc_html_x( "Group Name", 'disciple_tools' ) ?></strong> - <?php echo esc_html_x( "The name of the group is searchable and can be used to help you filter your contacts in the Groups List page.", 'Optional Documentation', 'disciple_tools' ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["group_status"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["group_status"]["description"] ) ?>
                    <ul>
                        <?php foreach ( $group_fields["group_status"]["default"] as $option ): ?>
                            <li><strong><?php echo esc_html( $option["label"] ) ?></strong> - <?php echo esc_html( $option["description"] ) ?? "" ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li><strong><?php echo esc_html( $group_fields["assigned_to"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["assigned_to"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["coaches"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["coaches"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["location_grid"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["location_grid"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["people_groups"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["people_groups"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $group_channels["address"]["label"] ) ?></strong> <?php echo esc_html( $group_channels["address"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["start_date"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["start_date"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["church_start_date"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["church_start_date"]["description"] ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["end_date"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["end_date"]["description"] ) ?></li>
            </ul>
            <!-- end Group Details modal -->
        </div>

        <!--    Assigned to -->
        <div class="help-section" id="assigned-to-help-text" style="display: none">
            <h3><?php echo esc_html( $group_fields["assigned_to"]["name"] )?></h3>
            <p><?php echo esc_html( $group_fields["assigned_to"]["description"] ) ?></p>
        </div>

        <!--    Group Coaches  -->
        <div class="help-section" id="coaches-help-text" style="display: none">
            <h3><?php echo esc_html( $group_fields["coaches"]["name"] ) ?></h3>
            <p><?php echo esc_html( $group_fields["coaches"]["description"] ) ?></p>
        </div>

        <!--  Group Health Metrics Tile  -->
        <div class="help-section" id="health-metrics-help-text" style="display: none">
            <h3><?php echo esc_html( $group_fields["health_metrics"]["name"] ) ?></h3>
            <p><?php echo esc_html( $group_fields["health_metrics"]["description"] ) ?></p>
            <ul>
                <?php foreach ( $group_fields["health_metrics"]["default"] as $option ): ?>
                    <li><strong><?php echo esc_html( $option["label"] ) ?></strong> - <?php echo esc_html( $option["description"] ) ?? "" ?></li>
                <?php endforeach; ?>
            </ul>
            <p><?php echo esc_html_x( "If the group/church regularly practices any of the elements listed, then click each element to add them inside the circle.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <p><?php echo esc_html_x( 'If the group has committed to be a church, indicate this by clicking the "Church Commitment" button to make the dotted line circle solid.', 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!-- Members Tile -->
        <div class="help-section" id="members-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Members", 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "This is the area where you manage the contacts that are a part of the group.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <h4><?php echo esc_html( $group_fields["member_count"]["name"] ) ?></h4>
            <p><?php echo esc_html( $group_fields["member_count"]["description"] ) ?></p>
            <h4><?php echo esc_html( $group_fields["members"]["name"] ) ?></h4>
            <p><?php echo esc_html( $group_fields["members"]["description"] ) ?></p>
            <p><?php echo esc_html_x( "To remove a member, click the X icon to the right side of the member name. Click the footprint icon next to the members name to signify that this person is a leader of this group. (Multiple leaders can be assigned to a group).", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <p><?php echo esc_html_x( "To add new members, click on the 'Create' or 'Select' and click on the name or search for them.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Group type  -->
        <div class="help-section" id="group-type-help-text" style="display: none">

            <h4><?php echo esc_html( $group_fields["group_type"]["name"] ) ?></h4>
            <p><?php echo esc_html( $group_fields["group_type"]["description"] ) ?></p>

            <ul>
                <?php foreach ( $group_fields["group_type"]["default"] as $option ): ?>
                    <li><strong><?php echo esc_html( $option["label"] ) ?></strong> - <?php echo esc_html( $option["description"] ?? "" ) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!--  Group Status  -->
        <div class="help-section" id="group-status-help-text" style="display: none">
            <h3><?php echo esc_html( $group_fields["group_status"]["name"] ) ?></h3>
            <p><?php echo esc_html( $group_fields["group_status"]["description"] ) ?></p>
            <!-- <?php echo esc_html( $group_fields["group_status"]["name"] ) ?> list -->
            <ul>
                <?php foreach ( $group_fields["group_status"]["default"] as $option ): ?>
                    <li><strong><?php echo esc_html( $option["label"] ) ?></strong> - <?php echo esc_html( $option["description"] ) ?? "" ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!--  Groups Tile  -->
        <div class="help-section" id="group-connections-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Group Connections", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "Here you can select what type of group this is and how it is related to other groups in the system.", 'Optional Documentation', 'disciple_tools' ) ?></p>

            <h4><?php echo esc_html( $group_fields["group_type"]["name"] ) ?></h4>
            <p><?php echo esc_html( $group_fields["group_type"]["description"] ) ?></p>
            <ul>
                <?php foreach ( $group_fields["group_type"]["default"] as $option ): ?>
                    <li><strong><?php echo esc_html( $option["label"] ) ?></strong> - <?php echo esc_html( $option["description"] ?? "" ) ?></li>
                <?php endforeach; ?>
            </ul>

            <h4><?php echo esc_html_x( "Group Connections", 'Optional Documentation', 'disciple_tools' ) ?></h4>
            <p><?php echo esc_html_x( "Connections this group has with other groups in this system.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <ul>
                <li><strong><?php echo esc_html( $group_fields["parent_groups"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["parent_groups"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["peer_groups"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["peer_groups"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["child_groups"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["child_groups"]["description"] ?? "" ) ?></li>
            </ul>
        </div>


        <!--  Four Fields Tile -->
        <div class="help-section" id="four-fields-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Four Fields", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "There are 5 squares in the Four Fields diagram. Starting in the top left quadrant and going clockwise and the fifth being in the middle, they stand for:", 'Optional Documentation', 'disciple_tools' ) ?></p>

            <ul>
                <li><strong><?php echo esc_html( $group_fields["four_fields_unbelievers"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["four_fields_unbelievers"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["four_fields_believers"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["four_fields_believers"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["four_fields_accountable"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["four_fields_accountable"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["four_fields_church_commitment"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["four_fields_church_commitment"]["description"] ?? "" ) ?></li>
                <li><strong><?php echo esc_html( $group_fields["four_fields_multiplying"]["name"] ) ?></strong> - <?php echo esc_html( $group_fields["four_fields_multiplying"]["description"] ?? "" ) ?></li>
            </ul>
        </div>


    <?php endif; ?>

    <!--    Comments and Activity - contact & group  -->
    <div class="help-section" id="comments-activity-help-text" style="display: none">
        <h3><?php echo esc_html_x( "Comments and Activity", 'Optional Documentation', 'disciple_tools' ) ?></h3>
        <p><?php echo esc_html_x( "This is where you can record notes from meetings and conversations.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        <p><?php echo esc_html_x( "Type @ and the name of a user to mention them in a comment. This user will then receive a notification.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        <p><?php echo esc_html_x( "This section also includes the history of activity, such as when the contact or group status became active etc.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        <p><?php echo esc_html_x( "You can filter this section either by 'All', 'Comments', or 'Activity'.", 'Optional Documentation', 'disciple_tools' ) ?></p>
    </div>

    <?php
    /**
     * Contact and Groups Lists
     */
    if ( is_archive() ):?>
        <!--  Filters Tile - left side -->
        <div class="help-section" id="filters-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Default and Custom Filters", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "Use these filters to focus in on the contacts or groups you are responsible for. If the default filters do not fit your needs you can create your own custom filter.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Contacts List Tile -->
        <div class="help-section" id="contacts-list-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Contacts List Tile", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "Your list of contacts will show up here. Whenever you filter contacts, the list will also be changed in this section too. You can sort your contacts by newest, oldest, most recently modified, and least recently modified. If you have a long list of contacts they will not all load at once, so clicking the 'Load more contacts' button at the bottom of the list will allow you to load more.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Groups List Tile -->
        <div class="help-section" id="groups-list-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Groups List Tile", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "Your list of groups will show up here. Whenever you filter groups, the list will also be changed in this section too. You can sort your groups by newest, oldest, most recently modified, and least recently modified. If you have a long list of groups they will not all load at once, so clicking the 'Load more groups' button at the bottom of the list will allow you to load more.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Contacts list switch -->
        <div class="help-section" id="contacts-switch-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Closed contacts switch", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "Use this toggle switch to either show or not show closed contacts in the list.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Groups list switch -->
        <div class="help-section" id="groups-switch-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Inactive Groups switch", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "Use this toggle switch to either show or not show inactive groups in the list.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>
    <?php endif; ?>


    <?php
    /**
     * New contact or group
     */
    $url_path = dt_get_url_path();
    if ( strpos( $url_path, "new" ) !== false ) : ?>
        <!-- Source  -->
        <div class="help-section" id="source-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_fields["sources"]["name"] ) ?></h3>
            <p><?php echo esc_html( $contact_fields["sources"]["description"] ) ?></p>
            <ul>
                <?php foreach ( $contact_fields["sources"]["default"] as $option ): ?>
                    <li><strong><?php echo esc_html( $option["label"] ) ?></strong> - <?php echo esc_html( $option["description"] ?? "" ) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!--  Location  -->
        <div class="help-section" id="location-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_fields["location_grid"]["name"] ) ?></h3>
            <p><?php echo esc_html( $contact_fields["location_grid"]["description"] ) ?></p>
        </div>

        <!--  Initial Comment  -->
        <div class="help-section" id="initial-comment-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Initial Comment", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "The Initial Comment field is for any extra information. It will be saved as the first comment under the Activity and Comments Tile.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  New Contact -->
        <div class="help-section" id="new-contact-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Create new contact", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "After writing the name of the contact, complete as many other fields as you can, before clicking 'Save and continue editing'. On the next screen you can edit and add more information about this new contact has just been just created.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Contact name -->
        <div class="help-section" id="contact-name-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Name of Contact", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "The name of the contact is searchable and can be used to help you filter your contacts in the Contacts List page.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Contact phone -->
        <div class="help-section" id="phone-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_channels["phone"]["label"] ) ?></h3>
            <p><?php echo esc_html( $contact_channels["phone"]["description"] ) ?></p>
        </div>

        <!--  Contact email -->
        <div class="help-section" id="email-help-text" style="display: none">
            <h3><?php echo esc_html( $contact_channels["email"]["label"] ) ?></h3>
            <p><?php echo esc_html( $contact_channels["email"]["description"] ) ?></p>
        </div>

        <!--  New Group -->
        <div class="help-section" id="new-group-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Create New Group", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "After writing the name of the group, complete as many other fields as you can, before clicking 'Save and continue editing'. On the next screen you can edit and add more information about this new group has just been created.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Group name -->
        <div class="help-section" id="group-name-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Name of Group", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "The name of the group is searchable and can be used to help you filter your contacts in the Groups List page.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>
    <?php endif; ?>



    <?php
    /**
     * Profile Settings Page
     */
    if ( 'settings' === $url_path ) : ?>
        <!--  Your Profile -->
        <div class="help-section" id="profile-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Your Profile", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "In this area you can see your user profile.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <p><?php echo esc_html_x( "You are not required to fill out any of these profile fields. They are optional to meet your team’s needs.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <p><?php echo esc_html_x( "By clicking 'Edit', you will be able adjust things like the language that this system operates in.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Your Locations  -->
        <div class="help-section" id="locations-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Locations", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "These are the areas you are responsible for. Clicking the 'Add' button will bring up a list of locations to choose from.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Your notifications -->
        <div class="help-section" id="notifications-help-text" style="display: none">
            <h3><?php echo esc_html_x( "Your Notifications", 'Optional Documentation', 'disciple_tools' ) ?></h3>
            <p><?php echo esc_html_x( "You will receive web notifications and email notifications based on your notification preferences. To change your preference, click the toggle buttons.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <ul>
                <li><?php echo esc_html_x( "Notifications Turned On: The toggle will appear blue.", 'Optional Documentation', 'disciple_tools' ) ?></li>
                <li><?php echo esc_html_x( "Notifications Turned Off: The toggle will appear grey.", 'Optional Documentation', 'disciple_tools' ) ?></li>
            </ul>
            <p><?php echo esc_html_x( "Some of the types of notifications cannot be adjusted because they are required by the system.", 'Optional Documentation', 'disciple_tools' ) ?></p>
            <p><?php echo esc_html_x( "Adjust whether you want to see notifications about new comments, contact information changes, Contact Milestones and Group Health metrics, and whether to you will receive a notification for any update that happens in the system.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        </div>

        <!--  Your availability -->
        <!--        <div class="help-section" id="availability-help-text" style="display: none">-->
        <!--            <h3>--><?php //echo esc_html_x( "Your availability", 'Optional Documentation', 'disciple_tools' ) ?><!--</h3>-->
        <!--            <p>--><?php //echo esc_html_x( "This availability feature allows you the user to set a start date and end date to schedule dates when you will be unavailable e.g. you are traveling or on vacation, so the Dispatcher will know your availability to receive new contacts.", 'Optional Documentation', 'disciple_tools' ) ?><!--</p>-->
        <!--        </div>-->

    <?php endif; ?>

    <!--   Notifications page -->
    <div class="help-section" id="notifications-template-help-text" style="display: none">
        <h3><?php echo esc_html_x( "Notifications Page", 'Optional Documentation', 'disciple_tools' ) ?></h3>
        <p><?php echo esc_html_x( "This Notifications Page is where you can read updates to users and groups. It displays notifications about activity on your records.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        <h4><?php echo esc_html_x( "All / Unread", 'Optional Documentation', 'disciple_tools' ) ?></h4>
        <p><?php echo esc_html_x( "Click the 'All' button to show the full list of all of your notifications.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        <p><?php echo esc_html_x( "Click the 'Unread' button to show the list of all of your unread notifications.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        <h4><?php echo esc_html_x( "Mark All as Read", 'Optional Documentation', 'disciple_tools' ) ?></h4>
        <p><?php echo esc_html_x( "If you don't want to click each filled in circle on the right side of each row to indicate the notification has been read, then click the 'Mark All as Read' link at the top to quickly adjust all the messages that they have all been read.", 'Optional Documentation', 'disciple_tools' ) ?></p>
        <h4><?php echo esc_html_x( "Settings", 'Optional Documentation', 'disciple_tools' ) ?></h4>
        <p><?php echo esc_html_x( "Click the 'Settings' link to go to the notifications settings area to adjust whether you want to see notifications about new comments, contact information changes, Contact Milestones and Group Health metrics, and whether to you will receive a notification for any update that happens in the system.", 'Optional Documentation', 'disciple_tools' ) ?></p>
    </div>

    <!--   Duplicates view page -->
    <div class="help-section" id="duplicates-template-help-text" style="display: none">
        <h3><?php echo esc_html_x( "Duplicate Contact page", 'Optional Documentation', 'disciple_tools' ) ?></h3>
        <p><?php echo esc_html_x( "This Duplicate Contact Page is where you can review, decline or merge contacts that have been picked up by the system (checking against their name, email and phone) as possibly being duplicates of another already existing contact.", 'Optional Documentation', 'disciple_tools' ) ?></p>
    </div>

    <!-- close -->
    <div class="grid-x grid-padding-x">
        <div class="cell small-4">
            <h5>&nbsp;</h5>
            <button class="button small" data-close aria-label="Close reveal" type="button">
                <?php echo esc_html__( 'Close', 'disciple_tools' )?>
            </button>
        </div>
        <div class="cell small-8">
            <!-- documentation link -->
            <div class="help-more">
                <h5><?php echo esc_html_x( "Need more help?", 'Optional Documentation', 'disciple_tools' ) ?></h5>
                <a class="button small" id="docslink" href="https://disciple-tools.readthedocs.io/en/latest/index.html"><?php echo esc_html_x( 'Read the documentation', 'Optional Documentation', 'disciple_tools' )?></a>
            </div>
        </div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
