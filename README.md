# SoG Full Stack Developer - Practical Exercise

### Development Environment
- Windows 10 (10.0.19045 Build 19045)
- Composer 2.7.1
- PHP 8.2.12
- Google Chrome (127.0.6533.89)

##
### How to get started
1. Ensure your system environment supports all versions as mentioned in the development environment
2. You need a local web server to run this application
3. Also make sure you have composer installed on your system
4. Clone the project: `git clone git@github.com:kutzborski-dev/sog-php-fs-exercise.git`
5. At the root of the project (where the `composer.json` file is located), in your terminal, run `composer du` to generate the autoload dump files
7. [Download the free sqlite database](https://www.kaggle.com/datasets/rtatman/188-million-us-wildfires?resource=download), add it to `src/data` and rename it to **db.sqlite**. You should end up with `src/data/db.sqlite` for the path.
8. Run your local web server and PHP if they aren't running already

##
### Dev notes/choices
**Branching strategy:** The repository is managed via a half-trunk, half-release based strategy, by having all development work done in the `dev` branch, which, once all testing (automated testing, manual testing, etc) has been completed and it's ready for release, can then be merged straight into the `master` branch, or a release branch can be created first where it's tested again before the release branch is merged into the `master` branch. This brings the makes it easy to switch to another management strategy in the future, e.g. a feature branch driven strategy, should the need ever arise. **NOTE:** In the real world every push or merge request to the master branch, perhaps even a release branch, should trigger an action flow that automatically tests the branch.

**Git issues:** Git issues are always referenced in fitting commit messages, to make everything tracable. Different git issues relating to one area or section of the project/app (e.g. a sprint) can be combined into a bigger issue, by creating a parent issue that lists these child issues. While perhaps not so important in a solo or duo dev team, in a team setting this allows for other team members, be they project managers or developers, to easily view the progress, and to pick/manage their own work from a bunch. Additional important details, such as perhaps user stories, can also be attached to this parent git issue.

**Design/Styling (UI/UX):** As it's a prototype application, the UI/UX is severely lacking and should be revised once more product work is planned

**Data access and business logic abstraction:** Abstraction of the layers is achieved mostly through the use of the Repository pattern in this project. While there are other methods out there to handle (or help with) abstraction and reusability (e.g. simple small Action classes and Service classes), using the Repository pattern itself could already be considered over-kill for this simple project. The pattern is used here because the project is treated to be agile and ever-evolving with the future in mind, and to showcase an example for abstraction.

**Improvements/Suggestions:** In a real world application the UI of a project like this is usually better done using a more front-end specialised framework, such as Vue.js, which comes with Laravel, or React, to have a seamless user experience when it comes navigation or other actions or interactivity. Usage is a styling framework, such as Tailwind, is also recommended.

**Unit tests:** Once moving away from a prototype towards working on a product build, writing meaningful tests for the application to at least cover the most important aspects of the application should be considered.