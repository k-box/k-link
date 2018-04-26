# K-Link

> the encouraging knowledge management solution

![](./klink-explore-static.png)

The [K-Link](https://k-link.technology) is a technology for public organizations, private companies and diverse communities to build strong institutional memories and foster cooperation by interconnecting information sources of partners.

## Getting started

K-Link is composed by different components:

- The [K-Link Explore site](./docs/website.md), contained in this repository
- The [K-Link Registry](https://github.com/k-box/k-link-registry) for controlling what applications can access 
  the network and their permission
- The [K-Search API](https://github.com/k-box/k-search), for adding, searching and removing documents
- And the optional [K-Link Video Streaming Service](https://github.com/k-box/k-link-video-streaming) if video playback on Mobile devices is needed

[Want to know more about the architecture, explore the internals](./docs/index.md)

### Requirements

In order to run the K-Link

- [Docker](https://www.docker.com/) and Docker compose
- 64bit Operating System supported by Docker (e.g. Debian, Ubuntu,...)
- At least 5GB of free hard drive space for the installation
- 2GB of RAM (4GB is better)
- A x86-64 (“64 bit”) processor is required. H264 acceleration is optional, but recommended if the video streaming service is deployed.

[See the complete list of requirements](./docs/requirements.md)

### Installation

K-Link can be installed on most Operating Systems. The setup is heavily based on [Docker](https://www.docker.com/).

[Learn more about how to install K-Link](./docs/installation.md)

## K-Link Explore 

K-Link Explore is a static website that is included with a K-Link deployment as a courtesy webpage.

[Learn more about K-Link Explore](./docs/website.md)

## Contribution

Thank you for considering contributing to the K-Link!

The contribution guide is not available yet, but in the meantime you can still submit Pull Requests.

## License

The K-Link components are generally licensed under AGPL v3 (unless specified differently in the respecting repositories).

The K-Link Explore website (this repository) is licensed under AGPL v3. See [License.txt](./LICENSE.txt).
