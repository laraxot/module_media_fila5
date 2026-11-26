---
title: "INDEX contratti — Media"
type: index
module: Media
status: active
created: 2026-11-23
updated: 2026-11-26
qmd: "media contracts index copertura invarianti pest group"
---

# Indice dei contratti — Media

Un contratto per ognuna delle 51 Action di `app/Actions` piu' uno per le interfacce di `app/Contracts`. Formato, copertura e
backlog: [README.md](README.md). «Provate» = invarianti con un `->group('<ID>')` nei test su totale; comando, da `laravel/`:
`vendor/bin/pest Modules/Media/tests --group=<ID>`.

| Contratto | Classe (`Modules\Media\...`) | Invarianti | Provate |
|---|---|---|---|
| [attach-media-action](attach-media-action.md) | `Actions\AttachMediaAction` | `ATTACH-MEDIA-INV-1` | 0/1 |
| [base-s3-action](base-s3-action.md) | `Actions\S3\BaseS3Action` | `BASE-S3-INV-1`..`2` | 0/2 |
| [build-config-debug-data-action](build-config-debug-data-action.md) | `Actions\Diagnostic\S3\BuildConfigDebugDataAction` | `BUILD-CONFIG-DEBUG-DATA-INV-1`..`2` | 0/2 |
| [check-bucket-policy-action](check-bucket-policy-action.md) | `Actions\Diagnostic\S3\CheckBucketPolicyAction` | `CHECK-BUCKET-POLICY-INV-1`..`2` | 0/2 |
| [check-file-exists-action](check-file-exists-action.md) | `Actions\S3\CheckFileExistsAction` | `CHECK-FILE-EXISTS-INV-1`..`2` | 0/2 |
| [convert-srt-to-vtt-action](convert-srt-to-vtt-action.md) | `Actions\Subtitle\ConvertSrtToVttAction` | `CONVERT-SRT-TO-VTT-INV-1`..`2` | 2/2 |
| [convert-video-action](convert-video-action.md) | `Actions\Video\ConvertVideoAction` | `CONVERT-VIDEO-INV-1`..`2` | 0/2 |
| [convert-video-by-convert-data-action](convert-video-by-convert-data-action.md) | `Actions\Video\ConvertVideoByConvertDataAction` | `CONVERT-VIDEO-BY-CONVERT-DATA-INV-1`..`3` | 1/3 |
| [convert-video-by-media-convert-action](convert-video-by-media-convert-action.md) | `Actions\Video\ConvertVideoByMediaConvertAction` | `CONVERT-VIDEO-BY-MEDIA-CONVERT-INV-1`..`4` | 2/4 |
| [create-filesystem-s3-client-action](create-filesystem-s3-client-action.md) | `Actions\Diagnostic\Aws\CreateFilesystemS3ClientAction` | `CREATE-FILESYSTEM-S3-CLIENT-INV-1`..`2` | 0/2 |
| [create-filesystem-sts-client-action](create-filesystem-sts-client-action.md) | `Actions\Diagnostic\Aws\CreateFilesystemStsClientAction` | `CREATE-FILESYSTEM-STS-CLIENT-INV-1` | 0/1 |
| [delete-file-action](delete-file-action.md) | `Actions\S3\DeleteFileAction` | `DELETE-FILE-INV-1`..`2` | 0/2 |
| [extract-subtitle-plain-text-action](extract-subtitle-plain-text-action.md) | `Actions\Subtitle\ExtractSubtitlePlainTextAction` | `EXTRACT-SUBTITLE-PLAIN-TEXT-INV-1`..`2` | 1/2 |
| [format-debug-output-action](format-debug-output-action.md) | `Actions\Diagnostic\S3\FormatDebugOutputAction` | `FORMAT-DEBUG-OUTPUT-INV-1`..`3` | 2/3 |
| [generate-temporary-upload-path-action](generate-temporary-upload-path-action.md) | `Actions\GenerateTemporaryUploadPathAction` | `MEDIA-PATH-INV-1`..`4` | 3/4 |
| [get-attachments-schema-action](get-attachments-schema-action.md) | `Actions\GetAttachmentsSchemaAction` | `GET-ATTACHMENTS-SCHEMA-INV-1`..`4` | 2/4 |
| [get-aws-config-snapshot-action](get-aws-config-snapshot-action.md) | `Actions\Diagnostic\Aws\GetAwsConfigSnapshotAction` | `GET-AWS-CONFIG-SNAPSHOT-INV-1`..`2` | 0/2 |
| [get-aws-s3-error-solution-action](get-aws-s3-error-solution-action.md) | `Actions\Diagnostic\Aws\GetAwsS3ErrorSolutionAction` | `RESOLVE-AWS-S3-ERROR-SOLUTION-INV-1`..`2` | 2/2 |
| [get-cloud-front-signed-url-action](get-cloud-front-signed-url-action.md) | `Actions\CloudFront\GetCloudFrontSignedUrlAction` | `GET-CLOUD-FRONT-SIGNED-URL-INV-1`..`2` | 0/2 |
| [get-effective-upload-limit-action](get-effective-upload-limit-action.md) | `Actions\Upload\GetEffectiveUploadLimitAction` | `GET-EFFECTIVE-UPLOAD-LIMIT-INV-1`..`4` | 3/4 |
| [get-file-info-action](get-file-info-action.md) | `Actions\S3\GetFileInfoAction` | `GET-FILE-INFO-INV-1`..`2` | 0/2 |
| [get-filesystem-adapter-action](get-filesystem-adapter-action.md) | `Actions\Storage\GetFilesystemAdapterAction` | `GET-FILESYSTEM-ADAPTER-INV-1` | 0/1 |
| [get-media-exporter-action](get-media-exporter-action.md) | `Actions\Ffmpeg\GetMediaExporterAction` | `RESOLVE-MEDIA-EXPORTER-INV-1`..`2` | 2/2 |
| [get-temporary-upload-conversion-path-action](get-temporary-upload-conversion-path-action.md) | `Actions\TemporaryUpload\GetTemporaryUploadConversionPathAction` | `GET-TEMPORARY-UPLOAD-CONVERSION-PATH-INV-1`..`2` | 0/2 |
| [get-temporary-upload-path-action](get-temporary-upload-path-action.md) | `Actions\TemporaryUpload\GetTemporaryUploadPathAction` | `GET-TEMPORARY-UPLOAD-PATH-INV-1`..`2` | 0/2 |
| [get-temporary-upload-responsive-path-action](get-temporary-upload-responsive-path-action.md) | `Actions\TemporaryUpload\GetTemporaryUploadResponsivePathAction` | `GET-TEMPORARY-UPLOAD-RESPONSIVE-PATH-INV-1`..`2` | 0/2 |
| [get-video-duration-action](get-video-duration-action.md) | `Actions\Video\GetVideoDurationAction` | `GET-VIDEO-DURATION-INV-1` | 0/1 |
| [get-video-frame-content-action](get-video-frame-content-action.md) | `Actions\Video\GetVideoFrameContentAction` | `GET-VIDEO-FRAME-CONTENT-INV-1`..`2` | 0/2 |
| [get-video-screenshot-action](get-video-screenshot-action.md) | `Actions\Video\GetVideoScreenshotAction` | `GET-VIDEO-SCREENSHOT-INV-1` | 0/1 |
| [merge](merge.md) | `Actions\Image\Merge` | `MERGE-INV-1`..`3` | 0/3 |
| [parse-subtitle-xml-action](parse-subtitle-xml-action.md) | `Actions\Subtitle\ParseSubtitleXmlAction` | `PARSE-SUBTITLE-XML-INV-1`..`3` | 3/3 |
| [path-generator](path-generator.md) | `Contracts\PathGenerator` | `PATH-GENERATOR-INV-1`..`2` | 0/2 |
| [run-full-aws-diagnostic-action](run-full-aws-diagnostic-action.md) | `Actions\Diagnostic\Aws\RunFullAwsDiagnosticAction` | `RUN-FULL-AWS-DIAGNOSTIC-INV-1` | 0/1 |
| [run-s3-save-test-action](run-s3-save-test-action.md) | `Actions\Diagnostic\S3\RunS3SaveTestAction` | `RUN-S3-SAVE-TEST-INV-1`..`2` | 0/2 |
| [save-attachments-action](save-attachments-action.md) | `Actions\SaveAttachmentsAction` | `MEDIA-ATTACH-INV-1`..`5` | 2/5 |
| [stream-video-action](stream-video-action.md) | `Actions\Stream\StreamVideoAction` | `STREAM-VIDEO-INV-1`..`4` | 0/4 |
| [strip-image-metadata-action](strip-image-metadata-action.md) | `Actions\Image\StripImageMetadataAction` | `MEDIA-STRIP-INV-1`..`5` | 5/5 |
| [svg-exists-action](svg-exists-action.md) | `Actions\Image\SvgExistsAction` | `SVG-EXISTS-INV-1`..`3` | 0/3 |
| [test-bucket-permissions-action](test-bucket-permissions-action.md) | `Actions\Diagnostic\S3\TestBucketPermissionsAction` | `TEST-BUCKET-PERMISSIONS-INV-1`..`2` | 0/2 |
| [test-cloud-front-config-action](test-cloud-front-config-action.md) | `Actions\Diagnostic\Aws\TestCloudFrontConfigAction` | `TEST-CLOUD-FRONT-CONFIG-INV-1`..`2` | 0/2 |
| [test-cloud-front-connection-action](test-cloud-front-connection-action.md) | `Actions\Diagnostic\S3\TestCloudFrontConnectionAction` | `TEST-CLOUD-FRONT-CONNECTION-INV-1`..`2` | 0/2 |
| [test-cloud-front-signed-urls-action](test-cloud-front-signed-urls-action.md) | `Actions\Diagnostic\Aws\TestCloudFrontSignedUrlsAction` | `TEST-CLOUD-FRONT-SIGNED-URLS-INV-1`..`2` | 0/2 |
| [test-connection-details-action](test-connection-details-action.md) | `Actions\Diagnostic\S3\TestConnectionDetailsAction` | `TEST-CONNECTION-DETAILS-INV-1`..`2` | 0/2 |
| [test-credentials-action](test-credentials-action.md) | `Actions\Diagnostic\S3\TestCredentialsAction` | `TEST-CREDENTIALS-INV-1`..`2` | 0/2 |
| [test-file-upload-download-action](test-file-upload-download-action.md) | `Actions\Diagnostic\S3\TestFileUploadDownloadAction` | `TEST-FILE-UPLOAD-DOWNLOAD-INV-1`..`2` | 0/2 |
| [test-iam-credentials-action](test-iam-credentials-action.md) | `Actions\Diagnostic\Aws\TestIamCredentialsAction` | `TEST-IAM-CREDENTIALS-INV-1`..`2` | 0/2 |
| [test-iam-policies-action](test-iam-policies-action.md) | `Actions\Diagnostic\Aws\TestIamPoliciesAction` | `TEST-IAM-POLICIES-INV-1` | 0/1 |
| [test-s3-connection-action](test-s3-connection-action.md) | `Actions\Diagnostic\Aws\TestS3ConnectionAction` | `TEST-S3-CONNECTION-INV-1`..`2` | 0/2 |
| [test-s3-file-operations-action](test-s3-file-operations-action.md) | `Actions\Diagnostic\Aws\TestS3FileOperationsAction` | `TEST-S3-FILE-OPERATIONS-INV-1`..`2` | 0/2 |
| [test-s3-permissions-action](test-s3-permissions-action.md) | `Actions\Diagnostic\Aws\TestS3PermissionsAction` | `TEST-S3-PERMISSIONS-INV-1` | 0/1 |
| [update-model-subtitle-field-action](update-model-subtitle-field-action.md) | `Actions\Subtitle\UpdateModelSubtitleFieldAction` | `UPDATE-MODEL-SUBTITLE-FIELD-INV-1` | 1/1 |
| [upload-file-action](upload-file-action.md) | `Actions\S3\UploadFileAction` | `UPLOAD-FILE-INV-1`..`3` | 0/3 |

Totale: 31/117 invarianti provate.
