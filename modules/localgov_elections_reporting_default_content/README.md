#  LocalGov Elections Reporting Demo module

This module provides default election content making it easier for people can test the LocalGov Elections Reporting
module.

The content is based on the UK General Election held in July 2024 and uses boundaries for Oxfordshire. It includes the
main political parties, but the candidate names and the results they received have been randomly generated.

## Updating content

The demo content uses the [Default Content](https://www.drupal.org/project/default_content) module, making it easy to
update the content if required.

To update the default content, enable this module, make the changes you would like and then export the changes with:

```shell

```

It's then necessary to manually edit the exported node files to remove the `field_winning_candidate`.

This is because of the way the Default Content module handles paragraph items.

