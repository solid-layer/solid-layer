# Contribution Guide

We priorities your concerns, you could also contribute to us, you may
- [create an issue](https://github.com/phalconslayer/framework/issues/new)
- [discuss some new features](https://phalconslayer.readme.io/discuss-new)
- [do pull request or merge request](https://github.com/phalconslayer/framework/pulls)

Automated testing is just our first way to automate every area of our code. Everytime we add/change a code, their might be possibilities that affects other relying code.

To hardly test everything, we must help each other, building an app would really help you to tackle those bugs, discrepancies or anything related.

Try to read our Coding Style if you will be pushing some codes. [Click Here](https://phalconslayer.readme.io/docs/misc-coding-style)

# Versioning and Releasing Process

We follow [semver.org](http://semver.org), there is major.minor.patch

Each release we have a branch that follows until the **minor** something like ``1.2`` branch

### patch

The **patch** should be interpreted as a ***bug fix*** only for each branch. There will be no new/removed features or added/removed files.

This patch only affects this repository itself, while the [framework](https://github.com/phalconslayer/framework) has a different approach, we can remove a scope code but the behavior must still retain. We only deprecate functions/methods or classes but we must not remove them until the **minor** release.

Inshort: we must checkout to branch ``1.2`` to create a fix release.

If a fixed merged to branch ``1.2`` the owner must release a new patch version.
Scenario, if the previous version was ``1.2.0`` the owner must release ``1.2.1`` pointing to branch ``1.2``

### minor

The **minor** should be able to add/remove features.
Scenario, if the previous version was ``1.2.8`` tag, the owner must create a new branch ``1.3`` and should release ``1.3.0`` pointing to branch ``1.3``

Inshort: we must checkout to branch ``master`` as it aliases the **framework** master branch as ``1.3-dev`` to be able to add/remove new features.

### major

The **major** release will affect all the relying trees such as **documentations**, **framework** repo, **configurations**, **folder structure**.
